<?php

namespace Psalm\Issue;

class MixedStringOffsetAssignment extends CodeIssue implements MixedIssue
{
    public static $ERROR_LEVEL = 1;
    public static $SHORTCODE = 35;

    use MixedIssueTrait;
}
