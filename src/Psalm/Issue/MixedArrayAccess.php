<?php

namespace Psalm\Issue;

class MixedArrayAccess extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel(): int { return 1; }
    public static function getShortCode(): int { return 51; }

    use MixedIssueTrait;
}
