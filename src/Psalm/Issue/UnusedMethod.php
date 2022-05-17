<?php

namespace Psalm\Issue;

class UnusedMethod extends MethodIssue
{
    public static function getErrorLevel(): int { return -2; }
    public static function getShortCode(): int { return 76; }
}
