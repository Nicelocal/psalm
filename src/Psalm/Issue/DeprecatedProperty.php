<?php

namespace Psalm\Issue;

class DeprecatedProperty extends PropertyIssue
{
    public static function getErrorLevel(): int { return 2; }
    public static function getShortCode(): int { return 99; }
}
