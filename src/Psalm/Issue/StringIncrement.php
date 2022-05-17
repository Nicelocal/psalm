<?php

namespace Psalm\Issue;

class StringIncrement extends CodeIssue
{
    public static function getErrorLevel(): int { return 4; }
    public static function getShortCode(): int { return 211; }
}
