<?php

namespace Psalm\Issue;

class UnrecognizedExpression extends CodeIssue
{
    public static function getErrorLevel() { return -1; }
    public static function getShortCode() { return 48; }
}
