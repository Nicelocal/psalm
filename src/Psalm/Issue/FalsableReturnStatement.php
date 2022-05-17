<?php

namespace Psalm\Issue;

class FalsableReturnStatement extends CodeIssue
{
    public static function getErrorLevel() { return 5; }
    public static function getShortCode() { return 137; }
}
