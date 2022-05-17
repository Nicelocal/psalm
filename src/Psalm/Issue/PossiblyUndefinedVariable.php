<?php

namespace Psalm\Issue;

class PossiblyUndefinedVariable extends CodeIssue
{
    public static function getErrorLevel(): int { return 3; }
    public static function getShortCode(): int { return 18; }
}
