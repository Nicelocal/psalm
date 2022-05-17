<?php

namespace Psalm\Issue;

class MixedReturnTypeCoercion extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 197; }

    use MixedIssueTrait;
}
