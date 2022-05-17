<?php

namespace Psalm\Issue;

class PossiblyUnusedProperty extends CodeIssue
{
    public static function getErrorLevel() { return -2; }
    public static function getShortCode() { return 149; }
}
