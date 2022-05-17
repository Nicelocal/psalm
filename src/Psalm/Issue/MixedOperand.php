<?php

namespace Psalm\Issue;

class MixedOperand extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel(): int { return 1; }
    public static function getShortCode(): int { return 59; }

    use MixedIssueTrait;
}
