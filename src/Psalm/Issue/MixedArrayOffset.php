<?php

namespace Psalm\Issue;

class MixedArrayOffset extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel(): int { return 1; }
    public static function getShortCode(): int { return 31; }

    use MixedIssueTrait;
}
