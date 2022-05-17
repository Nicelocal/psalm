<?php

namespace Psalm\Issue;

class DeprecatedProperty extends PropertyIssue
{
    public static function getErrorLevel() { return 2; }
    public static function getShortCode() { return 99; }
}
