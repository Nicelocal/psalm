<?php

namespace Psalm\Issue;

class UnusedMethodCall extends MethodIssue
{
    public static function getErrorLevel(): int { return -1; }
    public static function getShortCode(): int { return 209; }
}
