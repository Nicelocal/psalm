<?php

namespace Psalm\Issue;

class MixedPropertyFetch extends CodeIssue implements MixedIssue
{
    public static $ERROR_LEVEL = 1;
    public static $SHORTCODE = 34;

    use MixedIssueTrait;
}
