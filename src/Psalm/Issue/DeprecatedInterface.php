<?php

namespace Psalm\Issue;

class DeprecatedInterface extends ClassIssue
{
    public static function getErrorLevel() { return 2; }
    public static function getShortCode() { return 152; }
}
