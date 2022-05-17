<?php

namespace Psalm\Issue;

class MixedReturnStatement extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 138; }

    use MixedIssueTrait;
}
