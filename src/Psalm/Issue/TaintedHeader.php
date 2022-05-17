<?php

namespace Psalm\Issue;

class TaintedHeader extends TaintedInput
{
    public static function getShortCode(): int { return 256; }
}
