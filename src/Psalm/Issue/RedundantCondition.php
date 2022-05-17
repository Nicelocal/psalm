<?php

namespace Psalm\Issue;

use Psalm\CodeLocation;

class RedundantCondition extends CodeIssue
{
    public static function getErrorLevel() { return 4; }
    public static function getShortCode() { return 122; }

    public function __construct(string $message, CodeLocation $code_location, ?string $dupe_key)
    {
        parent::__construct($message, $code_location);
        $this->dupe_key = $dupe_key;
    }
}
