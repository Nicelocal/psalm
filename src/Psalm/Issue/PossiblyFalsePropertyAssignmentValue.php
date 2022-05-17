<?php

namespace Psalm\Issue;

class PossiblyFalsePropertyAssignmentValue extends PropertyIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 146; }
}
