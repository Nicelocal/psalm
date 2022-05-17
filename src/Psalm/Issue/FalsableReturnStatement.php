<?php

namespace Psalm\Issue;

class FalsableReturnStatement extends CodeIssue
{
    public static function getErrorLevel(): int { return 5; }
    public static function getShortCode(): int { return 137; }
}
