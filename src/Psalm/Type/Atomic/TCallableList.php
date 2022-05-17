<?php

namespace Psalm\Type\Atomic;

/**
 * Denotes a list that is _also_ `callable`.
 */
class TCallableList extends TNonEmptyList
{
    public static function getKeyConst(): string { return 'callable-list'; }
}
