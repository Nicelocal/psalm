<?php

namespace Psalm\Issue;

class UndefinedPropertyFetch extends PropertyIssue
{
    public static function getErrorLevel() { return 6; }
    public static function getShortCode() { return 39; }
}
