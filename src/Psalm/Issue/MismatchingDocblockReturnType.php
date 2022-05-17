<?php

namespace Psalm\Issue;

class MismatchingDocblockReturnType extends CodeIssue
{
    public static function getErrorLevel(): int { return 4; }
    public static function getShortCode(): int { return 142; }
}
