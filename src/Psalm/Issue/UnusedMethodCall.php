<?php

namespace Psalm\Issue;

class UnusedMethodCall extends MethodIssue
{
    public static function getErrorLevel() { return -1; }
    public static function getShortCode() { return 209; }
}
