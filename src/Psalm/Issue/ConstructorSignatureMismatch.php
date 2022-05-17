<?php

namespace Psalm\Issue;

class ConstructorSignatureMismatch extends CodeIssue
{
    public static function getErrorLevel() { return 5; }
    public static function getShortCode() { return 231; }
}
