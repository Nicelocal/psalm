<?php

namespace Psalm\Issue;

class UninitializedProperty extends PropertyIssue
{
    public static function getErrorLevel() { return 7; }
    public static function getShortCode() { return 186; }
}
