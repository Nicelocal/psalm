<?php

namespace Psalm\Issue;

class ImpurePropertyAssignment extends CodeIssue
{
    public static function getErrorLevel(): int { return -1; }
    public static function getShortCode(): int { return 204; }
}
