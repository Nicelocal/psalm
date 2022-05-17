<?php

namespace Psalm\Issue;

class MixedFunctionCall extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel(): int { return 1; }
    public static function getShortCode(): int { return 185; }

    use MixedIssueTrait;
}
