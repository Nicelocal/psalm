<?php

namespace Psalm\Issue;

class InvalidReturnType extends CodeIssue
{
    public static function getErrorLevel(): int { return 6; }
    public static function getShortCode(): int { return 11; }
}
