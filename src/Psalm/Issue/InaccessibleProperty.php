<?php

namespace Psalm\Issue;

class InaccessibleProperty extends CodeIssue
{
    public static function getErrorLevel(): int { return -1; }
    public static function getShortCode(): int { return 54; }
}
