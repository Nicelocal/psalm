<?php

namespace Psalm\Issue;

class MixedFunctionCall extends CodeIssue implements MixedIssue
{
    public static $ERROR_LEVEL = 1;
    public static $SHORTCODE = 185;

    use MixedIssueTrait;
}
