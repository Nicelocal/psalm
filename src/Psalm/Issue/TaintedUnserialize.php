<?php

namespace Psalm\Issue;

class TaintedUnserialize extends TaintedInput
{
    public static function getShortCode() { return 250; }
}
