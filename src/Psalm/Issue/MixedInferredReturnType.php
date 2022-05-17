<?php

namespace Psalm\Issue;

class MixedInferredReturnType extends CodeIssue implements MixedIssue
{
    public static function getErrorLevel() { return 1; }
    public static function getShortCode() { return 47; }

    use MixedIssueTrait;
}
