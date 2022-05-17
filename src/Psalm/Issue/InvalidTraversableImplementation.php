<?php

namespace Psalm\Issue;

class InvalidTraversableImplementation extends ClassIssue
{
    public static function getErrorLevel() { return 7; }
    public static function getShortCode() { return 266; }
}
