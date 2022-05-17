<?php

namespace Psalm\Issue;

class TooManyArguments extends ArgumentIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 26; }
}
