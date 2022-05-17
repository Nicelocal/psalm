<?php

namespace Psalm\Issue;

class MixedPropertyAssignment extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel(): int { return 1; }
    public static function getShortCode(): int { return 33; }

    use MixedIssueTrait;
}
