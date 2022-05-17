<?php

namespace Psalm\Issue;

class PossiblyInvalidArrayOffset extends CodeIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 116; }
}
