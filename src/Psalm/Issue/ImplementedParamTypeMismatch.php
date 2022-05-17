<?php

namespace Psalm\Issue;

class ImplementedParamTypeMismatch extends CodeIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 199; }
}
