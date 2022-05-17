<?php

namespace Psalm\Issue;

class OverriddenMethodAccess extends CodeIssue
{
    public static function getErrorLevel(): int { return 7; }
    public static function getShortCode(): int { return 66; }
}
