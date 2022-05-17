<?php

namespace Psalm\Issue;

class MixedPropertyFetch extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel(): int { return 1; }
    public static function getShortCode(): int { return 34; }

    use MixedIssueTrait;
}
