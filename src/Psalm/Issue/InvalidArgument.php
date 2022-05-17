<?php

namespace Psalm\Issue;

class InvalidArgument extends ArgumentIssue
{
    public static function getErrorLevel() { return 6; }
    public static function getShortCode() { return 4; }
}
