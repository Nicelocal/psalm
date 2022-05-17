<?php

namespace Psalm\Issue;

class UndefinedInterfaceMethod extends MethodIssue
{
    public static function getErrorLevel() { return 5; }
    public static function getShortCode() { return 181; }
}
