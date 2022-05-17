<?php

namespace Psalm\Issue;

class InvalidEnumCaseValue extends ClassIssue
{
    public static function getErrorLevel(): int { return -1; }
    public static function getShortCode(): int { return 278; }
}
