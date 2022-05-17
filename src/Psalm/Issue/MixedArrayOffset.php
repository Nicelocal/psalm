<?php

namespace Psalm\Issue;

class MixedArrayOffset extends CodeIssue implements MixedIssue
{
    public static $ERROR_LEVEL = 1;
    public static $SHORTCODE = 31;

    use MixedIssueTrait;
}
