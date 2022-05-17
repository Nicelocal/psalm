<?php

namespace Psalm\Issue;

class MixedAssignment extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 32; }

    use MixedIssueTrait;
}
