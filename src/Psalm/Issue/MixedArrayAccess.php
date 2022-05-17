<?php

namespace Psalm\Issue;

class MixedArrayAccess extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 51; }

    use MixedIssueTrait;
}
