<?php

namespace Psalm\Issue;

class InvalidToString extends CodeIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 55; }
}
