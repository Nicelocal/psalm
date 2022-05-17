<?php

namespace Psalm\Issue;

class NoInterfaceProperties extends ClassIssue
{
    public static function getErrorLevel(): int { return 4; }
    public static function getShortCode(): int { return 28; }
}
