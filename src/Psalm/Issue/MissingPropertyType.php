<?php

namespace Psalm\Issue;

class MissingPropertyType extends PropertyIssue
{
    public static function getErrorLevel(): int { return 2; }
    public static function getShortCode(): int { return 45; }
}
