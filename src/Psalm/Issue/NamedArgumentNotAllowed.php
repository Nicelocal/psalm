<?php

namespace Psalm\Issue;

class NamedArgumentNotAllowed extends ArgumentIssue
{
    public static function getErrorLevel() { return 7; }
    public static function getShortCode() { return 268; }
}
