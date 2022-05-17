<?php

namespace Psalm\Issue;

class UnrecognizedStatement extends CodeIssue
{
    public static function getErrorLevel(): int { return -1; }
    public static function getShortCode(): int { return 49; }
}
