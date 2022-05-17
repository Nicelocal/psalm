<?php

namespace Psalm\Issue;

class LessSpecificReturnStatement extends CodeIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 129; }
}
