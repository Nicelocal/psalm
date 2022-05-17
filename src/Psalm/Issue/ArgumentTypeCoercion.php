<?php

namespace Psalm\Issue;

class ArgumentTypeCoercion extends ArgumentIssue
{
    public static function getErrorLevel(): int { return 3; }
    public static function getShortCode(): int { return 193; }
}
