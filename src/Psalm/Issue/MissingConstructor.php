<?php

namespace Psalm\Issue;

use Psalm\CodeLocation;

class MissingConstructor extends CodeIssue
{
    public static function getErrorLevel() { return 2; }
    public static function getShortCode() { return 73; }

    public function __construct(string $message, CodeLocation $code_location, ?string $dupe_key)
    {
        parent::__construct($message, $code_location);
        $this->dupe_key = $dupe_key;
    }
}
