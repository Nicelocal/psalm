<?php

namespace Psalm\Issue;

class UndefinedThisPropertyAssignment extends PropertyIssue
{
    public static function getErrorLevel() { return 5; }
    public static function getShortCode() { return 40; }
}
