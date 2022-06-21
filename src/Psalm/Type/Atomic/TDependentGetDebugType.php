<?php

namespace Psalm\Type\Atomic;

use Psalm\Type\Atomic;

/**
 * Represents a string whose value is that of a type found by get_debug_type($var)
 */
final class TDependentGetDebugType extends TString implements DependentType
{
    /**
     * @param string $typeof the variable id
     */
    public function __construct(public readonly string $typeof)
    {
    }

    public function getKey(bool $include_extra = true): string
    {
        return 'get-debug-type-of<' . $this->typeof . '>';
    }

    public function getVarId(): string
    {
        return $this->typeof;
    }

    public function getReplacement(): Atomic
    {
        return new TString();
    }

    public function canBeFullyExpressedInPhp(int $analysis_php_version_id): bool
    {
        return false;
    }
}
