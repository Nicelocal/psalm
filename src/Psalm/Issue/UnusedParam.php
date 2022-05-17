<?php

namespace Psalm\Issue;

class UnusedParam extends CodeIssue
{
    public static function getErrorLevel() { return -2; }
    public static function getShortCode() { return 135; }
}
