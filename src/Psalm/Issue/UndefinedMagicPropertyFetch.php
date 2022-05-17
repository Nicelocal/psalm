<?php

namespace Psalm\Issue;

class UndefinedMagicPropertyFetch extends PropertyIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 218; }
}
