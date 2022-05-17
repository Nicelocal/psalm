<?php

namespace Psalm\Issue;

class DuplicateConstant extends ClassIssue
{
    public static function getErrorLevel() { return -1; }
    public static function getShortCode() { return 302; }
}
