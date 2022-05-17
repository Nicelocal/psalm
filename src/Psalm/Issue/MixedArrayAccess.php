<?php

namespace Psalm\Issue;

class MixedArrayAccess extends CodeIssue implements MixedIssue
{
    public static $ERROR_LEVEL = 1;
    public static $SHORTCODE = 51;

    use MixedIssueTrait;
}
