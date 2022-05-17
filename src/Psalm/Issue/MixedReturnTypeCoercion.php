<?php

namespace Psalm\Issue;

class MixedReturnTypeCoercion extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel(): int { return 1; }
    public static function getShortCode(): int { return 197; }

    use MixedIssueTrait;
}
