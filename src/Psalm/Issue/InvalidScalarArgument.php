<?php

namespace Psalm\Issue;

class InvalidScalarArgument extends ArgumentIssue
{
    public static function getErrorLevel(): int { return 4; }
    public static function getShortCode(): int { return 12; }
}
