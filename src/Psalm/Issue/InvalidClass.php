<?php

namespace Psalm\Issue;

class InvalidClass extends ClassIssue
{
    public static function getErrorLevel() { return 6; }
    public static function getShortCode() { return 7; }
}
