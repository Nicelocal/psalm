<?php

namespace Psalm\Issue;

class MixedPropertyAssignment extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 33; }

    use MixedIssueTrait;
}
