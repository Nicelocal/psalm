<?php

namespace Psalm\Issue;

class MixedPropertyAssignment extends CodeIssue implements MixedIssue
{
    public static $ERROR_LEVEL = 1;
    public static $SHORTCODE = 33;

    use MixedIssueTrait;
}
