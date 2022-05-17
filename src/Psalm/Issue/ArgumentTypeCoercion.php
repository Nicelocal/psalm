<?php

namespace Psalm\Issue;

class ArgumentTypeCoercion extends ArgumentIssue
{
    public static function getErrorLevel() { return 3; }
    public static function getShortCode() { return 193; }
}
