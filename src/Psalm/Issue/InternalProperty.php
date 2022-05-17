<?php

namespace Psalm\Issue;

class InternalProperty extends PropertyIssue
{
    public static function getErrorLevel(): int { return 4; }
    public static function getShortCode(): int { return 176; }
}
