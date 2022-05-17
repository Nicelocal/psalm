<?php

namespace Psalm\Issue;

class OverriddenMethodAccess extends CodeIssue
{
    public static function getErrorLevel() { return 7; }
    public static function getShortCode() { return 66; }
}
