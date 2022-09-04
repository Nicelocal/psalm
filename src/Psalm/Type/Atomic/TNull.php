<?php

namespace Psalm\Type\Atomic;

use Psalm\Type\Atomic;

/**
 * Denotes the `null` type
 */
final class TNull extends Atomic
{
    public function __construct(bool $from_docblock = false)
    {
        $this->from_docblock = $from_docblock;
    }
    public function getKey(bool $include_extra = true): string
    {
        return 'null';
    }

    /**
     * @param  array<lowercase-string, string> $aliased_classes
     */
    public function toPhpString(
        ?string $namespace,
        array $aliased_classes,
        ?string $this_class,
        int $analysis_php_version_id
    ): ?string {
        return null;
    }

    public function canBeFullyExpressedInPhp(int $analysis_php_version_id): bool
    {
        return false;
    }
}
