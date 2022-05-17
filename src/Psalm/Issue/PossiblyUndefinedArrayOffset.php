<?php

namespace Psalm\Issue;

class PossiblyUndefinedArrayOffset extends CodeIssue
{
    public static function getErrorLevel(): int { return 3; }
    public static function getShortCode(): int { return 167; }
}
