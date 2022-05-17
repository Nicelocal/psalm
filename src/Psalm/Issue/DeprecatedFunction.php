<?php

namespace Psalm\Issue;

class DeprecatedFunction extends FunctionIssue
{
    public static function getErrorLevel(): int { return 2; }
    public static function getShortCode(): int { return 201; }
}
