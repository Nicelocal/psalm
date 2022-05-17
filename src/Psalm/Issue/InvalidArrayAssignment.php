<?php

namespace Psalm\Issue;

class InvalidArrayAssignment extends CodeIssue
{
    public static function getErrorLevel() { return 6; }
    public static function getShortCode() { return 6; }
}
