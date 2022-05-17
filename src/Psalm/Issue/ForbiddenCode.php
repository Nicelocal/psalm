<?php

namespace Psalm\Issue;

class ForbiddenCode extends CodeIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 2; }
}
