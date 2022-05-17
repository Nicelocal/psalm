<?php

namespace Psalm\Issue;

class MixedOperand extends CodeIssue implements MixedIssue
{
    public static $ERROR_LEVEL = 1;
    public static $SHORTCODE = 59;

    use MixedIssueTrait;
}
