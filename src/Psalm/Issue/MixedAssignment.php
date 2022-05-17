<?php

namespace Psalm\Issue;

class MixedAssignment extends CodeIssue implements MixedIssue
{
    public static $ERROR_LEVEL = 1;
    public static $SHORTCODE = 32;

    use MixedIssueTrait;
}
