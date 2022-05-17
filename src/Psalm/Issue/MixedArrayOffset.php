<?php

namespace Psalm\Issue;

class MixedArrayOffset extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 31; }

    use MixedIssueTrait;
}
