<?php

namespace Psalm\Issue;

class UndefinedPropertyFetch extends PropertyIssue
{
    public static function getErrorLevel(): int { return 6; }
    public static function getShortCode(): int { return 39; }
}
