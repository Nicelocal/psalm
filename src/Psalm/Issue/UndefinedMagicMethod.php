<?php

namespace Psalm\Issue;

class UndefinedMagicMethod extends MethodIssue
{
    public static function getErrorLevel(): int { return 4; }
    public static function getShortCode(): int { return 219; }
}
