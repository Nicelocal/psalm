<?php

namespace Psalm\Issue;

class UndefinedFunction extends FunctionIssue
{
    public static function getErrorLevel(): int { return -1; }
    public static function getShortCode(): int { return 21; }
}
