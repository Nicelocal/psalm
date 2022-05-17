<?php

namespace Psalm\Issue;

class PossiblyNullReference extends CodeIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 83; }
}
