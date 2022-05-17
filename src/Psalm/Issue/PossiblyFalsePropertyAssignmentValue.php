<?php

namespace Psalm\Issue;

class PossiblyFalsePropertyAssignmentValue extends PropertyIssue
{
    public static function getErrorLevel(): int { return 3; }
    public static function getShortCode(): int { return 146; }
}
