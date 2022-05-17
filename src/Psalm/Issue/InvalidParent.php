<?php

namespace Psalm\Issue;

class InvalidParent extends CodeIssue
{
    public static function getErrorLevel(): int { return -1; }
    public static function getShortCode(): int { return 214; }
}
