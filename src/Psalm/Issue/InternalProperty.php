<?php

namespace Psalm\Issue;

class InternalProperty extends PropertyIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 176; }
}
