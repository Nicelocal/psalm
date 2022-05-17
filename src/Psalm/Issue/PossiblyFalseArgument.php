<?php

namespace Psalm\Issue;

class PossiblyFalseArgument extends ArgumentIssue
{
    public static function getErrorLevel(): int { return 3; }
    public static function getShortCode(): int { return 104; }
}
