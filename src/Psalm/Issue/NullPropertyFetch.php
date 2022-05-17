<?php

namespace Psalm\Issue;

/**
 * This is different from NullReference, as PHP throws a notice (vs the possibility of a fatal error with a null
 * reference)
 */
class NullPropertyFetch extends CodeIssue
{
    public static function getErrorLevel() { return -1; }
    public static function getShortCode() { return 27; }
}
