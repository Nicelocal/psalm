<?php

namespace Psalm\Issue;

class PropertyTypeCoercion extends PropertyIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 198; }
}
