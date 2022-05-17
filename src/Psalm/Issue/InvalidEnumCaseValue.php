<?php

namespace Psalm\Issue;

class InvalidEnumCaseValue extends ClassIssue
{
    public static function getErrorLevel() { return -1; }
    public static function getShortCode() { return 278; }
}
