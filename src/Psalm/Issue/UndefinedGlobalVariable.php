<?php

namespace Psalm\Issue;

class UndefinedGlobalVariable extends VariableIssue
{
    public static function getErrorLevel(): int { return -1; }
    public static function getShortCode(): int { return 127; }
}
