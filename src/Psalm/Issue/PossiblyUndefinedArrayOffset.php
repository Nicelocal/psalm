<?php

namespace Psalm\Issue;

class PossiblyUndefinedArrayOffset extends CodeIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 167; }
}
