<?php

namespace Psalm\Issue;

class UninitializedProperty extends PropertyIssue
{
    public static function getErrorLevel(): int { return 7; }
    public static function getShortCode(): int { return 186; }
}
