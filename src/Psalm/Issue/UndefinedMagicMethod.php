<?php

namespace Psalm\Issue;

class UndefinedMagicMethod extends MethodIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 219; }
}
