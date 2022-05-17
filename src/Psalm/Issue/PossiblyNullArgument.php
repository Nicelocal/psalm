<?php

namespace Psalm\Issue;

class PossiblyNullArgument extends ArgumentIssue
{
    public static function getErrorLevel(): int { return 3; }
    public static function getShortCode(): int { return 78; }
}
