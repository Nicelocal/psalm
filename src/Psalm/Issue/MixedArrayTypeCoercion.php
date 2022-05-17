<?php

namespace Psalm\Issue;

class MixedArrayTypeCoercion extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 195; }

    use MixedIssueTrait;
}
