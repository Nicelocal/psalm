<?php

namespace Psalm\Issue;

class UndefinedFunction extends FunctionIssue
{
    public static function getErrorLevel() { return -1; }
    public static function getShortCode() { return 21; }
}
