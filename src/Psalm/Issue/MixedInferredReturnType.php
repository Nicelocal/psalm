<?php

namespace Psalm\Issue;

class MixedInferredReturnType extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel(): int { return 1; }
    public static function getShortCode(): int { return 47; }

    use MixedIssueTrait;
}
