<?php

namespace Psalm\Issue;

class PossiblyUndefinedGlobalVariable extends VariableIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 126; }
}
