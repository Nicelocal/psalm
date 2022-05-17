<?php

namespace Psalm\Issue;

class MethodSignatureMustOmitReturnType extends CodeIssue
{
    public static function getErrorLevel() { return -1; }
    public static function getShortCode() { return 168; }
}
