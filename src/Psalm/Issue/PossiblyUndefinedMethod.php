<?php

namespace Psalm\Issue;

class PossiblyUndefinedMethod extends MethodIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 108; }
}
