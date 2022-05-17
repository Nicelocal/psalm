<?php

namespace Psalm\Issue;

class Trace extends CodeIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 224; }
}
