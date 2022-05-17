<?php

namespace Psalm\Issue;

class MixedArrayAssignment extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel(): int { return 1; }
    public static function getShortCode(): int { return 117; }

    use MixedIssueTrait;
}
