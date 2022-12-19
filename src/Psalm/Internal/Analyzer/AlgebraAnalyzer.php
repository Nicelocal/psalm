<?php

namespace Psalm\Internal\Analyzer;

use PhpParser;
use Psalm\CodeLocation;
use Psalm\Exception\ComplicatedExpressionException;
use Psalm\Internal\ClauseConjunction;
use Psalm\Issue\ParadoxicalCondition;
use Psalm\Issue\RedundantCondition;
use Psalm\IssueBuffer;
use Psalm\Storage\Assertion\InArray;
use Psalm\Storage\Assertion\NotInArray;

use function array_intersect_key;
use function count;
use function implode;

/**
 * @internal
 */
class AlgebraAnalyzer
{
    /**
     * This looks to see if there are any clauses in one formula that contradict
     * clauses in another formula, or clauses that duplicate previous clauses
     *
     * e.g.
     * if ($a) { }
     * elseif ($a) { }
     *
     * @param  array<string, int>  $new_assigned_var_ids
     */
    public static function checkForParadox(
        ClauseConjunction $formula_1,
        ClauseConjunction $formula_2,
        StatementsAnalyzer $statements_analyzer,
        PhpParser\Node $stmt,
        array $new_assigned_var_ids
    ): void {
        try {
            $negated_formula2 = $formula_2->getNegation();
        } catch (ComplicatedExpressionException $e) {
            return;
        }

        $formula_1_hashes = [];

        foreach ($formula_1->clauses as $formula_1_clause) {
            $formula_1_hashes[$formula_1_clause->hash] = true;
        }

        $formula_2_hashes = [];

        foreach ($formula_2->clauses as $formula_2_clause) {
            $hash = $formula_2_clause->hash;

            if (!$formula_2_clause->generated
                && !$formula_2_clause->wedge
                && $formula_2_clause->reconcilable
                && (isset($formula_1_hashes[$hash]) || isset($formula_2_hashes[$hash]))
                && !array_intersect_key($new_assigned_var_ids, $formula_2_clause->possibilities)
            ) {
                IssueBuffer::maybeAdd(
                    new RedundantCondition(
                        $formula_2_clause . ' has already been asserted',
                        new CodeLocation($statements_analyzer, $stmt),
                        'already asserted ' . $formula_2_clause,
                    ),
                    $statements_analyzer->getSuppressedIssues(),
                );
            }

            $formula_2_hashes[$hash] = true;
        }

        // remove impossible types
        foreach ($negated_formula2->clauses as $negated_clause_2) {
            if (!$negated_clause_2->reconcilable || $negated_clause_2->wedge) {
                continue;
            }

            foreach ($formula_1->clauses as $clause_1) {
                if ($negated_clause_2 === $clause_1 || !$clause_1->reconcilable || $clause_1->wedge) {
                    continue;
                }

                $negated_clause_2_contains_1_possibilities = true;

                foreach ($clause_1->possibilities as $key => $keyed_possibilities) {
                    if (!isset($negated_clause_2->possibilities[$key])) {
                        $negated_clause_2_contains_1_possibilities = false;
                        break;
                    }

                    if ($negated_clause_2->possibilities[$key] != $keyed_possibilities) {
                        $negated_clause_2_contains_1_possibilities = false;
                        break;
                    }
                    foreach ($keyed_possibilities as $possibility) {
                        if ($possibility instanceof InArray || $possibility instanceof NotInArray) {
                            $negated_clause_2_contains_1_possibilities = false;
                            break;
                        }
                    }
                }

                if ($negated_clause_2_contains_1_possibilities) {
                    $mini_formula_2 = (new ClauseConjunction([$negated_clause_2]))->getNegation();

                    if (!$mini_formula_2->clauses[0]->wedge) {
                        if (count($mini_formula_2->clauses) > 1) {
                            $paradox_message = 'Condition ((' . implode(') && (', $mini_formula_2->clauses) . '))'
                                . ' contradicts a previously-established condition (' . $clause_1 . ')';
                        } else {
                            $paradox_message = 'Condition (' . $mini_formula_2->clauses[0] . ')'
                                . ' contradicts a previously-established condition (' . $clause_1 . ')';
                        }
                    } else {
                        $paradox_message = 'Condition not(' . $negated_clause_2 . ')'
                            . ' contradicts a previously-established condition (' . $clause_1 . ')';
                    }

                    IssueBuffer::maybeAdd(
                        new ParadoxicalCondition(
                            $paradox_message,
                            new CodeLocation($statements_analyzer, $stmt),
                        ),
                        $statements_analyzer->getSuppressedIssues(),
                    );

                    return;
                }
            }
        }
    }
}
