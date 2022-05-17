<?php

namespace Psalm\Issue;

class NoInterfaceProperties extends ClassIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 28; }
}
