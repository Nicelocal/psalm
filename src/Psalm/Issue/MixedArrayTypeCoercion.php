<?php

namespace Psalm\Issue;

class MixedArrayTypeCoercion extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel(): int { return 1; }
    public static function getShortCode(): int { return 195; }

    use MixedIssueTrait;
}
