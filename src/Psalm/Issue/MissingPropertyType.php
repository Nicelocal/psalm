<?php

namespace Psalm\Issue;

class MissingPropertyType extends PropertyIssue
{
    public static function getErrorLevel() { return 2; }
    public static function getShortCode() { return 45; }
}
