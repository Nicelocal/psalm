<?php

namespace Psalm\Issue;

class DeprecatedTrait extends CodeIssue
{
    public static function getErrorLevel() { return 2; }
    public static function getShortCode() { return 171; }
}
