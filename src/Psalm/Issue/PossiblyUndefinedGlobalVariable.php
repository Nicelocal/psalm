<?php

namespace Psalm\Issue;

class PossiblyUndefinedGlobalVariable extends VariableIssue
{
    public static function getErrorLevel(): int { return 3; }
    public static function getShortCode(): int { return 126; }
}
