<?php

namespace Psalm\Issue;

class UndefinedMagicPropertyAssignment extends PropertyIssue
{
    public static function getErrorLevel(): int { return 4; }
    public static function getShortCode(): int { return 217; }
}
