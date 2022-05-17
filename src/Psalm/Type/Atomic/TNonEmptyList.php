<?php

namespace Psalm\Type\Atomic;

/**
 * Represents a non-empty list
 */
class TNonEmptyList extends TList
{
    /**
     * @var int|null
     */
    public $count;

    public static function getKeyConst(): string { return 'non-empty-list'; }

    public function getAssertionString(bool $exact = false): string
    {
        return 'non-empty-list';
    }
}
