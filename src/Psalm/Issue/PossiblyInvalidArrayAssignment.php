<?php

namespace Psalm\Issue;

class PossiblyInvalidArrayAssignment extends CodeIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 118; }
}
