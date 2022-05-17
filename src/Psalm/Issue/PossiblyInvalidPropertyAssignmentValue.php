<?php

namespace Psalm\Issue;

class PossiblyInvalidPropertyAssignmentValue extends PropertyIssue
{
    public static function getErrorLevel(): int { return 3; }
    public static function getShortCode(): int { return 147; }
}
