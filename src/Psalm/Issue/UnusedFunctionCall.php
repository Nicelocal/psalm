<?php

namespace Psalm\Issue;

class UnusedFunctionCall extends FunctionIssue
{
    public static function getErrorLevel(): int { return -1; }
    public static function getShortCode(): int { return 206; }
}
