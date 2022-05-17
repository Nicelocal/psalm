<?php

namespace Psalm\Issue;

class UndefinedMagicPropertyFetch extends PropertyIssue
{
    public static function getErrorLevel(): int { return 4; }
    public static function getShortCode(): int { return 218; }
}
