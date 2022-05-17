<?php

namespace Psalm\Issue;

class PossiblyInvalidArgument extends ArgumentIssue
{
    public static function getErrorLevel(): int { return 3; }
    public static function getShortCode(): int { return 92; }
}
