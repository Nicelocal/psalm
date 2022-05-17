<?php

namespace Psalm\Issue;

class DeprecatedMethod extends MethodIssue
{
    public static function getErrorLevel() { return 2; }
    public static function getShortCode() { return 1; }
}
