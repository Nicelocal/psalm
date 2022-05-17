<?php

namespace Psalm\Issue;

class UndefinedGlobalVariable extends VariableIssue
{
    public static function getErrorLevel() { return -1; }
    public static function getShortCode() { return 127; }
}
