<?php

namespace Psalm\Issue;

class PossiblyInvalidArgument extends ArgumentIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 92; }
}
