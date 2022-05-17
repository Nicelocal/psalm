<?php

namespace Psalm\Issue;

class MethodSignatureMustOmitReturnType extends CodeIssue
{
    public static function getErrorLevel(): int { return -1; }
    public static function getShortCode(): int { return 168; }
}
