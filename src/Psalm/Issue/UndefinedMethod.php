<?php

namespace Psalm\Issue;

class UndefinedMethod extends MethodIssue
{
    public static function getErrorLevel() { return 6; }
    public static function getShortCode() { return 22; }
}
