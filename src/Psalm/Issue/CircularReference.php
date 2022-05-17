<?php

namespace Psalm\Issue;

class CircularReference extends CodeIssue
{
    public static function getErrorLevel() { return 7; }
    public static function getShortCode() { return 131; }
}
