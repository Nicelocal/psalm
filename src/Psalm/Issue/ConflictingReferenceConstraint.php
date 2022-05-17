<?php

namespace Psalm\Issue;

class ConflictingReferenceConstraint extends CodeIssue
{
    public static function getErrorLevel(): int { return 7; }
    public static function getShortCode(): int { return 85; }
}
