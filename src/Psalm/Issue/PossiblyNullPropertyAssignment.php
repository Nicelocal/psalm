<?php

namespace Psalm\Issue;

/**
 * This is different from PossiblyNullReference, as PHP throws a notice (vs the possibility of a fatal error with a null
 * reference)
 */
class PossiblyNullPropertyAssignment extends CodeIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 81; }
}
