<?php

namespace Psalm\Issue;

class InternalMethod extends MethodIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 175; }
}
