<?php

namespace Psalm\Issue;

class UndefinedMagicPropertyAssignment extends PropertyIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 217; }
}
