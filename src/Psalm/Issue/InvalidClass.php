<?php

namespace Psalm\Issue;

class InvalidClass extends ClassIssue
{
    public static function getErrorLevel(): int { return 6; }
    public static function getShortCode(): int { return 7; }
}
