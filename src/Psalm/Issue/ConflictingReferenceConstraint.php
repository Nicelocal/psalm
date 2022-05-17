<?php

namespace Psalm\Issue;

class ConflictingReferenceConstraint extends CodeIssue
{
    public static function getErrorLevel() { return 7; }
    public static function getShortCode() { return 85; }
}
