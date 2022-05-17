<?php

namespace Psalm\Issue;

class MixedMethodCall extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel(): int { return 1; }
    public static function getShortCode(): int { return 15; }

    use MixedIssueTrait;
}
