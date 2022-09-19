<?php

namespace Psalm\Internal\Analyzer\Statements\Expression;

use PhpParser;
use PhpParser\Node\Scalar\EncapsedStringPart;
use Psalm\Context;
use Psalm\Internal\Analyzer\Statements\ExpressionAnalyzer;
use Psalm\Internal\Analyzer\StatementsAnalyzer;
use Psalm\Node\Expr\BinaryOp\VirtualConcat;
use Psalm\Node\Scalar\VirtualString;

/**
 * @internal
 */
class EncapsulatedStringAnalyzer
{
    public static function analyze(
        StatementsAnalyzer $statements_analyzer,
        PhpParser\Node\Scalar\Encapsed $stmt,
        Context $context
    ): bool {
        $last = null;
        foreach ($stmt->parts as $part) {
            if ($part instanceof EncapsedStringPart) {
                $part = new VirtualString($part->value);
            }
            if ($last) {
                $last = new VirtualConcat(
                    $last,
                    $part
                );
            } else {
                $last = $part;
            }
        }
        $result = ExpressionAnalyzer::analyze(
            $statements_analyzer,
            $last,
            $context
        );
        $type = $statements_analyzer->node_data->getType($last);
        if ($type) {
            $statements_analyzer->node_data->setType($stmt, $type);
        }

        return $result;
    }
}
