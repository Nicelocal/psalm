<?php

namespace Psalm\Issue;

class MixedAssignment extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel(): int { return 1; }
    public static function getShortCode(): int { return 32; }

    use MixedIssueTrait;
}
