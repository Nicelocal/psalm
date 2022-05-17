<?php

namespace Psalm\Type\Atomic;

/**
 * Denotes an object-like array that is _also_ `callable`.
 */
class TCallableKeyedArray extends TKeyedArray
{
    public static function getKeyConst(): string { return 'callable-array'; }

    public function getKey(bool $include_extra = true): string
    {
        return 'array';
    }
}
