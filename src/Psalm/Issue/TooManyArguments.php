<?php

namespace Psalm\Issue;

class TooManyArguments extends ArgumentIssue
{
    public static function getErrorLevel(): int { return 4; }
    public static function getShortCode(): int { return 26; }
}
