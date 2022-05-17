<?php

declare(strict_types=1);

namespace Psalm\Issue;

final class NonInvariantDocblockPropertyType extends CodeIssue
{
    public static function getErrorLevel(): int { return 3; }
    public static function getShortCode(): int { return 267; }
}
