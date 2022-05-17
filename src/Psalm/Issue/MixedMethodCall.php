<?php

namespace Psalm\Issue;

class MixedMethodCall extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 15; }

    use MixedIssueTrait;
}
