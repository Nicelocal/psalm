<?php

namespace Psalm\Issue;

class UndefinedThisPropertyAssignment extends PropertyIssue
{
    public static function getErrorLevel(): int { return 5; }
    public static function getShortCode(): int { return 40; }
}
