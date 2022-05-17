<?php

namespace Psalm\Issue;

class DuplicateEnumCaseValue extends ClassIssue
{
    public static function getErrorLevel() { return -1; }
    public static function getShortCode() { return 279; }
}
