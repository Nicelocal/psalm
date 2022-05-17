<?php

namespace Psalm\Issue;

class InvalidOperand extends CodeIssue
{
    public static function getErrorLevel(): int { return 4; }
    public static function getShortCode(): int { return 58; }
}
