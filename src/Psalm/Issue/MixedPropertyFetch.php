<?php

namespace Psalm\Issue;

class MixedPropertyFetch extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 34; }

    use MixedIssueTrait;
}
