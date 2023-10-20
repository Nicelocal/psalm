<?php

declare(strict_types=1);

namespace Psalm\Storage\Assertion;

use Psalm\Storage\Assertion;

/**
 * @psalm-immutable
 */
final class DoesNotHaveExactCount extends Assertion
{
    /** @param positive-int $count */
    public function __construct(public int $count)
    {
    }

    public function isNegation(): bool
    {
        return true;
    }

    public function getNegation(): Assertion
    {
        return new HasExactCount($this->count);
    }

    public function __toString(): string
    {
        return '!has-exact-count-' . $this->count;
    }

    public function isNegationOf(Assertion $assertion): bool
    {
        return $assertion instanceof HasExactCount && $assertion->count === $this->count;
    }
}
