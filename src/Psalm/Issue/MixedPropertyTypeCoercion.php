<?php

namespace Psalm\Issue;

use Psalm\CodeLocation;

class MixedPropertyTypeCoercion extends PropertyIssue implements MixedIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 196; }

    use MixedIssueTrait;

    public function __construct(
        string $message,
        CodeLocation $code_location,
        string $property_id,
        ?CodeLocation $origin_location = null
    ) {
        parent::__construct($message, $code_location, $property_id);
        $this->origin_location = $origin_location;
    }
}
