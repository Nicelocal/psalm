<?php

namespace Psalm\Issue;

class PossiblyFalseOperand extends CodeIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 162; }
}
