<?php

namespace Psalm\Issue;

class PossiblyNullPropertyAssignmentValue extends PropertyIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 148; }
}
