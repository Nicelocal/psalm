<?php

namespace Psalm\Issue;

class UndefinedInterfaceMethod extends MethodIssue
{
    public static function getErrorLevel(): int { return 5; }
    public static function getShortCode(): int { return 181; }
}
