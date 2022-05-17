<?php

namespace Psalm\Issue;

class PossiblyUnusedMethod extends MethodIssue
{
    public static function getErrorLevel() { return -2; }
    public static function getShortCode() { return 87; }
}
