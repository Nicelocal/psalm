<?php

namespace Psalm\Issue;

/**
 * This is different from NullReference, as PHP throws a notice (vs the possibility of a fatal error with a null
 * reference)
 */
class NullPropertyAssignment extends CodeIssue
{
    public static $ERROR_LEVEL = -1;
    public static $SHORTCODE = 36;
}
