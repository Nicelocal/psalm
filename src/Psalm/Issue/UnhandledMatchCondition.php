<?php

namespace Psalm\Issue;

class UnhandledMatchCondition extends CodeIssue
{
    public static function getErrorLevel(): int { return 7; }
    public static function getShortCode(): int { return 236; }
}
