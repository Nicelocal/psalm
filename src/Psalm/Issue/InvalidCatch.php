<?php

namespace Psalm\Issue;

class InvalidCatch extends ClassIssue
{
    public static function getErrorLevel(): int { return 6; }
    public static function getShortCode(): int { return 132; }
}
