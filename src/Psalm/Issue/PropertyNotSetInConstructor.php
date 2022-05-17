<?php

namespace Psalm\Issue;

use Psalm\CodeLocation;

class PropertyNotSetInConstructor extends PropertyIssue
{
    public static function getErrorLevel() { return 2; }
    public static function getShortCode() { return 74; }

    public function __construct(
        string $message,
        CodeLocation $code_location,
        string $property_id
    ) {
        parent::__construct($message, $code_location, $property_id);
        $this->dupe_key = $property_id;
    }
}
