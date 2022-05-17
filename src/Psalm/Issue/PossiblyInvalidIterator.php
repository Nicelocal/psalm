<?php

namespace Psalm\Issue;

class PossiblyInvalidIterator extends CodeIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 165; }
}
