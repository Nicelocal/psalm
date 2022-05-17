<?php

namespace Psalm\Issue;

class MixedReturnStatement extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel(): int { return 1; }
    public static function getShortCode(): int { return 138; }

    use MixedIssueTrait;
}
