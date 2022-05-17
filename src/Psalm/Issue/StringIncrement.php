<?php

namespace Psalm\Issue;

class StringIncrement extends CodeIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 211; }
}
