<?php

namespace Psalm\Issue;

class MixedArrayAssignment extends CodeIssue implements MixedIssue
{
    public static $ERROR_LEVEL = 1;
    public static $SHORTCODE = 117;

    use MixedIssueTrait;
}
