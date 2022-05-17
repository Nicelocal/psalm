<?php

namespace Psalm\Issue;

class MixedStringOffsetAssignment extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 35; }

    use MixedIssueTrait;
}
