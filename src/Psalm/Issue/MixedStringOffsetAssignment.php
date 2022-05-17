<?php

namespace Psalm\Issue;

class MixedStringOffsetAssignment extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel(): int { return 1; }
    public static function getShortCode(): int { return 35; }

    use MixedIssueTrait;
}
