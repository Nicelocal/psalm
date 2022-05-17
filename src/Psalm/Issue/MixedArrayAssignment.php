<?php

namespace Psalm\Issue;

class MixedArrayAssignment extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 117; }

    use MixedIssueTrait;
}
