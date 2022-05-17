<?php

namespace Psalm\Issue;

class InvalidCast extends CodeIssue
{
    public static function getErrorLevel(): int { return 6; }
    public static function getShortCode(): int { return 103; }
}
