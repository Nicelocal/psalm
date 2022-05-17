<?php

namespace Psalm\Issue;

class NullableReturnStatement extends CodeIssue
{
    public static function getErrorLevel() { return 5; }
    public static function getShortCode() { return 139; }
}
