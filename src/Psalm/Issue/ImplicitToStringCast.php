<?php

namespace Psalm\Issue;

class ImplicitToStringCast extends CodeIssue
{
    public static function getErrorLevel(): int { return 4; }
    public static function getShortCode(): int { return 60; }
}
