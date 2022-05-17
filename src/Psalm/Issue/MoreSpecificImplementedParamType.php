<?php

namespace Psalm\Issue;

class MoreSpecificImplementedParamType extends CodeIssue
{
    public static function getErrorLevel(): int { return 5; }
    public static function getShortCode(): int { return 140; }
}
