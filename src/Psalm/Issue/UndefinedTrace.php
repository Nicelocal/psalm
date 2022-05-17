<?php

namespace Psalm\Issue;

class UndefinedTrace extends CodeIssue
{
    public static function getErrorLevel(): int { return 2; }
    public static function getShortCode(): int { return 225; }
}
