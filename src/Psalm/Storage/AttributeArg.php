<?php

declare(strict_types=1);

namespace Psalm\Storage;

use Psalm\CodeLocation;
use Psalm\Internal\Scanner\UnresolvedConstantComponent;
use Psalm\Type\Union;

/**
 * @psalm-immutable
 * @api
 */
final class AttributeArg
{
    use ImmutableNonCloneableTrait;

    public function __construct(
        public ?string $name,
        public Union|UnresolvedConstantComponent $type,
        public CodeLocation $location,
    ) {
    }
}
