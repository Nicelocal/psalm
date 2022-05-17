<?php

namespace Psalm\Issue;

class MixedClone extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 227; }

    use MixedIssueTrait;
}
