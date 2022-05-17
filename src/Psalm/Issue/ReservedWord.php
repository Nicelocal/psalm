<?php

namespace Psalm\Issue;

class ReservedWord extends ClassIssue
{
    public static function getErrorLevel(): int { return 7; }
    public static function getShortCode(): int { return 95; }
}
