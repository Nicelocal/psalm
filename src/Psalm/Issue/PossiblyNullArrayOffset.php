<?php

namespace Psalm\Issue;

class PossiblyNullArrayOffset extends CodeIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 125; }
}
