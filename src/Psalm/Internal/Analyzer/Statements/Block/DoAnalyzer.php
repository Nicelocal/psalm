<?php

namespace Psalm\Internal\Analyzer\Statements\Block;

use PhpParser;
use Psalm\CodeLocation;
use Psalm\Context;
use Psalm\Internal\Algebra;
use Psalm\Internal\Algebra\FormulaGenerator;
use Psalm\Internal\Analyzer\ScopeAnalyzer;
use Psalm\Internal\Analyzer\StatementsAnalyzer;
use Psalm\Internal\Clause;
use Psalm\Internal\ClauseConjunction;
use Psalm\Internal\Scope\LoopScope;
use Psalm\Type;
use Psalm\Type\Reconciler;
use UnexpectedValueException;

use function array_diff;
use function array_filter;
use function array_keys;
use function array_merge;
use function array_values;
use function in_array;
use function preg_match;
use function preg_quote;
use function spl_object_id;

/**
 * @internal
 */
class DoAnalyzer
{
    public static function analyze(
        StatementsAnalyzer $statements_analyzer,
        PhpParser\Node\Stmt\Do_ $stmt,
        Context $context
    ): ?bool {
        $do_context = clone $context;
        $do_context->break_types[] = 'loop';
        $do_context->inside_loop = true;

        $codebase = $statements_analyzer->getCodebase();

        if ($codebase->alter_code) {
            $do_context->branch_point = $do_context->branch_point ?: (int) $stmt->getAttribute('startFilePos');
        }

        $loop_scope = new LoopScope($do_context, $context);
        $loop_scope->protected_var_ids = $context->protected_var_ids;

        self::analyzeDoNaively($statements_analyzer, $stmt, $do_context, $loop_scope);

        $mixed_var_ids = [];

        foreach ($do_context->vars_in_scope as $var_id => $type) {
            if ($type->hasMixed()) {
                $mixed_var_ids[] = $var_id;
            }
        }

        $cond_id = spl_object_id($stmt->cond);

        $while_clauses = FormulaGenerator::getFormula(
            $cond_id,
            $cond_id,
            $stmt->cond,
            $context->self,
            $statements_analyzer,
            $codebase
        );

        $while_clauses = $while_clauses->filter(
            static function (Clause $c) use ($mixed_var_ids): bool {
                $keys = array_keys($c->possibilities);

                $mixed_var_ids = array_diff($mixed_var_ids, $keys);

                foreach ($keys as $key) {
                    foreach ($mixed_var_ids as $mixed_var_id) {
                        if (preg_match('/^' . preg_quote($mixed_var_id, '/') . '(\[|-)/', $key)) {
                            return false;
                        }
                    }
                }

                return true;
            }
        );

        if (!$while_clauses->clauses) {
            $while_clauses = new ClauseConjunction([new Clause([], $cond_id, $cond_id, true)]);
        }

        if (LoopAnalyzer::analyze(
            $statements_analyzer,
            $stmt->stmts,
            WhileAnalyzer::getAndExpressions($stmt->cond),
            [],
            $loop_scope,
            $inner_loop_context,
            true,
            true
        ) === false) {
            return false;
        }

        // because it's a do {} while, inner loop vars belong to the main context
        if (!$inner_loop_context) {
            throw new UnexpectedValueException('There should be an inner loop context');
        }

        $negated_while_clauses = $while_clauses->getNegation();

        $negated_while_types = $context->clauses
            ->andSimplified($negated_while_clauses)
            ->getTruthsFromFormula();

        if ($negated_while_types) {
            $changed_var_ids = [];

            [$inner_loop_context->vars_in_scope, $inner_loop_context->references_in_scope] =
                Reconciler::reconcileKeyedTypes(
                    $negated_while_types,
                    [],
                    $inner_loop_context->vars_in_scope,
                    $inner_loop_context->references_in_scope,
                    $changed_var_ids,
                    [],
                    $statements_analyzer,
                    [],
                    true,
                    new CodeLocation($statements_analyzer->getSource(), $stmt->cond)
                );
        }

        foreach ($inner_loop_context->vars_in_scope as $var_id => $type) {
            // if there are break statements in the loop it's not certain
            // that the loop has finished executing, so the assertions at the end
            // the loop in the while conditional may not hold
            if (in_array(ScopeAnalyzer::ACTION_BREAK, $loop_scope->final_actions, true)) {
                if (isset($loop_scope->possibly_defined_loop_parent_vars[$var_id])) {
                    $context->vars_in_scope[$var_id] = Type::combineUnionTypes(
                        $type,
                        $loop_scope->possibly_defined_loop_parent_vars[$var_id]
                    );
                }
            } else {
                $context->vars_in_scope[$var_id] = $type;
            }
        }

        $do_context->loop_scope = null;

        $context->vars_possibly_in_scope = array_merge(
            $context->vars_possibly_in_scope,
            $do_context->vars_possibly_in_scope
        );

        if ($context->collect_exceptions) {
            $context->mergeExceptions($inner_loop_context);
        }

        return null;
    }

    private static function analyzeDoNaively(
        StatementsAnalyzer $statements_analyzer,
        PhpParser\Node\Stmt\Do_ $stmt,
        Context $context,
        LoopScope $loop_scope
    ): void {
        $do_context = clone $context;

        $suppressed_issues = $statements_analyzer->getSuppressedIssues();

        if (!in_array('RedundantCondition', $suppressed_issues, true)) {
            $statements_analyzer->addSuppressedIssues(['RedundantCondition']);
        }
        if (!in_array('RedundantConditionGivenDocblockType', $suppressed_issues, true)) {
            $statements_analyzer->addSuppressedIssues(['RedundantConditionGivenDocblockType']);
        }
        if (!in_array('TypeDoesNotContainType', $suppressed_issues, true)) {
            $statements_analyzer->addSuppressedIssues(['TypeDoesNotContainType']);
        }

        $do_context->loop_scope = $loop_scope;

        $statements_analyzer->analyze($stmt->stmts, $do_context);

        if (!in_array('RedundantCondition', $suppressed_issues, true)) {
            $statements_analyzer->removeSuppressedIssues(['RedundantCondition']);
        }
        if (!in_array('RedundantConditionGivenDocblockType', $suppressed_issues, true)) {
            $statements_analyzer->removeSuppressedIssues(['RedundantConditionGivenDocblockType']);
        }
        if (!in_array('TypeDoesNotContainType', $suppressed_issues, true)) {
            $statements_analyzer->removeSuppressedIssues(['TypeDoesNotContainType']);
        }
    }
}
