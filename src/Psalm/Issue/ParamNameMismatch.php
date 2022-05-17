<?php

namespace Psalm\Issue;

class ParamNameMismatch extends CodeIssue
{
    public static function getErrorLevel(): int { return 7; }
    public static function getShortCode(): int { return 230; }
}
