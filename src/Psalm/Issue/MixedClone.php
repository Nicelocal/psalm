<?php

namespace Psalm\Issue;

class MixedClone extends CodeIssue implements MixedIssue
{
    public static $ERROR_LEVEL = 1;
    public static $SHORTCODE = 227;

    use MixedIssueTrait;
}
