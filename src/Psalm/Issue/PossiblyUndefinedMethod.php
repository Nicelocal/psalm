<?php

namespace Psalm\Issue;

class PossiblyUndefinedMethod extends MethodIssue
{
    public static function getErrorLevel(): int { return 3; }
    public static function getShortCode(): int { return 108; }
}
