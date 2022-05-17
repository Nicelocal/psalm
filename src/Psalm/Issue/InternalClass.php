<?php

namespace Psalm\Issue;

class InternalClass extends ClassIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 174; }
}
