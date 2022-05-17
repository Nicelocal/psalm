<?php

namespace Psalm\Issue;

class TaintedSSRF extends TaintedInput
{
    public static function getShortCode(): int { return 253; }
}
