<?php

namespace Psalm\Issue;

class MixedReturnStatement extends CodeIssue implements MixedIssue
{
    public static $ERROR_LEVEL = 1;
    public static $SHORTCODE = 138;

    use MixedIssueTrait;
}
