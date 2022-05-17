<?php

namespace Psalm\Issue;

class UnsafeGenericInstantiation extends CodeIssue
{
    public static function getErrorLevel() { return 2; }
    public static function getShortCode() { return 269; }
}
