<?php

namespace Psalm\Issue;

class InvalidTypeImport extends CodeIssue
{
    public static function getErrorLevel() { return 7; }
    public static function getShortCode() { return 233; }
}
