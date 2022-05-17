<?php

namespace Psalm\Issue;

class ImplicitToStringCast extends CodeIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 60; }
}
