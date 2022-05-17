<?php

namespace Psalm\Issue;

class UndefinedMethod extends MethodIssue
{
    public static function getErrorLevel(): int { return 6; }
    public static function getShortCode(): int { return 22; }
}
