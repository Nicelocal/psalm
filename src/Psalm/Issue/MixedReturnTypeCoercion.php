<?php

namespace Psalm\Issue;

class MixedReturnTypeCoercion extends CodeIssue implements MixedIssue
{
    public static $ERROR_LEVEL = 1;
    public static $SHORTCODE = 197;

    use MixedIssueTrait;
}
