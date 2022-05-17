<?php

namespace Psalm\Issue;

class ImplementedReturnTypeMismatch extends CodeIssue
{
    public static function getErrorLevel(): int { return 4; }
    public static function getShortCode(): int { return 123; }
}
