<?php

namespace Psalm\Issue;

class MixedOperand extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 59; }

    use MixedIssueTrait;
}
