<?php

namespace Psalm\Issue;

class InvalidDocblock extends CodeIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 8; }
}
