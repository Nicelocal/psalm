<?php

namespace Psalm\Issue;

class DeprecatedMethod extends MethodIssue
{
    public static function getErrorLevel(): int { return 2; }
    public static function getShortCode(): int { return 1; }
}
