<?php

namespace Psalm\Issue;

class MissingDocblockType extends CodeIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 110; }
}
