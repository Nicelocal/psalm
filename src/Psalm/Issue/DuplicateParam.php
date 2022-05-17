<?php

namespace Psalm\Issue;

class DuplicateParam extends CodeIssue
{
    public static function getErrorLevel(): int { return -1; }
    public static function getShortCode(): int { return 65; }
}
