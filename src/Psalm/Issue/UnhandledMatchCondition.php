<?php

namespace Psalm\Issue;

class UnhandledMatchCondition extends CodeIssue
{
    public static function getErrorLevel() { return 7; }
    public static function getShortCode() { return 236; }
}
