<?php

namespace Psalm\Issue;

class DeprecatedFunction extends FunctionIssue
{
    public static function getErrorLevel() { return 2; }
    public static function getShortCode() { return 201; }
}
