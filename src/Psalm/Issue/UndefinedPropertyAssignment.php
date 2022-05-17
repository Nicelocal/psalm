<?php

namespace Psalm\Issue;

class UndefinedPropertyAssignment extends PropertyIssue
{
    public static function getErrorLevel() { return 6; }
    public static function getShortCode() { return 38; }
}
