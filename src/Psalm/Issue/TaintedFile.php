<?php

namespace Psalm\Issue;

class TaintedFile extends TaintedInput
{
    public static function getShortCode(): int { return 255; }
}
