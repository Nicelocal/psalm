<?php

namespace Psalm\Issue;

class InvalidLiteralArgument extends ArgumentIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 237; }
}
