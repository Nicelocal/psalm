<?php

namespace Psalm\Issue;

class NamedArgumentNotAllowed extends ArgumentIssue
{
    public static function getErrorLevel(): int { return 7; }
    public static function getShortCode(): int { return 268; }
}
