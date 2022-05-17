<?php

namespace Psalm\Issue;

class UnusedFunctionCall extends FunctionIssue
{
    public static function getErrorLevel() { return -1; }
    public static function getShortCode() { return 206; }
}
