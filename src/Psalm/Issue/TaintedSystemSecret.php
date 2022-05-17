<?php

namespace Psalm\Issue;

class TaintedSystemSecret extends TaintedInput
{
    public static function getShortCode(): int { return 248; }
}
