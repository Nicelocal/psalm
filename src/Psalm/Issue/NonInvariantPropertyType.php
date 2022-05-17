<?php

declare(strict_types=1);

namespace Psalm\Issue;

final class NonInvariantPropertyType extends CodeIssue
{
    public static function getErrorLevel() { return -1; }
    public static function getShortCode() { return 265; }
}
