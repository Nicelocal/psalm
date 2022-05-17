<?php

namespace Psalm\Issue;

class NoValue extends CodeIssue
{
    public static function getErrorLevel() { return -1; }
    public static function getShortCode() { return 179; }
}
