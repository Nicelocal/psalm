<?php

namespace Psalm\Issue;

class TooFewArguments extends ArgumentIssue
{
    public static function getErrorLevel() { return -1; }
    public static function getShortCode() { return 25; }
}
