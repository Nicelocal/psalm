<?php

namespace Psalm\Issue;

class MethodSignatureMismatch extends CodeIssue
{
    public static function getErrorLevel() { return 7; }
    public static function getShortCode() { return 42; }
}
