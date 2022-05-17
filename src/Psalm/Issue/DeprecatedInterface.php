<?php

namespace Psalm\Issue;

class DeprecatedInterface extends ClassIssue
{
    public static function getErrorLevel(): int { return 2; }
    public static function getShortCode(): int { return 152; }
}
