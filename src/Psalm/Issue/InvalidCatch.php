<?php

namespace Psalm\Issue;

class InvalidCatch extends ClassIssue
{
    public static function getErrorLevel() { return 6; }
    public static function getShortCode() { return 132; }
}
