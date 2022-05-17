<?php

namespace Psalm\Issue;

class MoreSpecificReturnType extends CodeIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 70; }
}
