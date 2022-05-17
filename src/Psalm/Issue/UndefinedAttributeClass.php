<?php

namespace Psalm\Issue;

class UndefinedAttributeClass extends ClassIssue
{
    public static function getErrorLevel() { return -1; }
    public static function getShortCode() { return 241; }
}
