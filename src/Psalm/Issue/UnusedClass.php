<?php

namespace Psalm\Issue;

class UnusedClass extends ClassIssue
{
    public static function getErrorLevel(): int { return -2; }
    public static function getShortCode(): int { return 75; }
}
