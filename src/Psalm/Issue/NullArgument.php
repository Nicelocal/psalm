<?php

namespace Psalm\Issue;

class NullArgument extends ArgumentIssue
{
    public static function getErrorLevel() { return 6; }
    public static function getShortCode() { return 57; }
}
