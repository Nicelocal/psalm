<?php

namespace Psalm\Issue;

class MixedFunctionCall extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 185; }

    use MixedIssueTrait;
}
