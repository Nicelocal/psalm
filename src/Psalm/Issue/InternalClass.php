<?php

namespace Psalm\Issue;

class InternalClass extends ClassIssue
{
    public static function getErrorLevel(): int { return 4; }
    public static function getShortCode(): int { return 174; }
}
