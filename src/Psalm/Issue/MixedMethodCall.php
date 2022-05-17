<?php

namespace Psalm\Issue;

class MixedMethodCall extends CodeIssue implements MixedIssue
{
    public static $ERROR_LEVEL = 1;
    public static $SHORTCODE = 15;

    use MixedIssueTrait;
}
