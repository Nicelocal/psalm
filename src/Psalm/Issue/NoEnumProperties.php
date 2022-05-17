<?php

namespace Psalm\Issue;

class NoEnumProperties extends ClassIssue
{
    public static function getErrorLevel() { return -1; }
    public static function getShortCode() { return 301; }
}
