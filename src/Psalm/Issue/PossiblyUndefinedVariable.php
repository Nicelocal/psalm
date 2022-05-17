<?php

namespace Psalm\Issue;

class PossiblyUndefinedVariable extends CodeIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 18; }
}
