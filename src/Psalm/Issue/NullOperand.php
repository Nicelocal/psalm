<?php

namespace Psalm\Issue;

class NullOperand extends CodeIssue
{
    public static function getErrorLevel() { return 2; }
    public static function getShortCode() { return 61; }
}
