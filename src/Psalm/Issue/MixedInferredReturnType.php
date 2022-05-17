<?php

namespace Psalm\Issue;

class MixedInferredReturnType extends CodeIssue implements MixedIssue
{
    public static $ERROR_LEVEL = 1;
    public static $SHORTCODE = 47;

    use MixedIssueTrait;
}
