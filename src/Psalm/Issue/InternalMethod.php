<?php

namespace Psalm\Issue;

class InternalMethod extends MethodIssue
{
    public static function getErrorLevel(): int { return 4; }
    public static function getShortCode(): int { return 175; }
}
