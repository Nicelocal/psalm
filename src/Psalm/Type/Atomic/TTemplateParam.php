<?php

namespace Psalm\Type\Atomic;

use Psalm\Codebase;
use Psalm\Internal\Type\TemplateResult;
use Psalm\Type\Atomic;
use Psalm\Type\Union;

use function array_map;
use function implode;

/**
 * denotes a template parameter that has been previously specified in a `@template` tag.
 */
final class TTemplateParam extends Atomic
{
    use HasIntersectionTrait;

    public function __construct(public readonly string $param_name, public readonly Union $as, public readonly string $defining_class)
    {
    }

    public function __clone()
    {
        $this->cloneIntersection();
        $this->as = clone $this->as;
    }

    public function getKey(bool $include_extra = true): string
    {
        if ($include_extra && $this->extra_types) {
            return $this->param_name . ':' . $this->defining_class . '&' . implode('&', $this->extra_types);
        }

        return $this->param_name . ':' . $this->defining_class;
    }

    public function getAssertionString(): string
    {
        return $this->as->getId();
    }

    public function getId(bool $exact = true, bool $nested = false): string
    {
        if (!$exact) {
            return $this->param_name;
        }

        if ($this->extra_types) {
            return '(' . $this->param_name . ':' . $this->defining_class . ' as ' . $this->as->getId($exact)
                . ')&' . implode('&', array_map(static fn(Atomic $type): string
                    => $type->getId($exact, true), $this->extra_types));
        }

        return ($nested ? '(' : '') . $this->param_name
            . ':' . $this->defining_class
            . ' as ' . $this->as->getId($exact) . ($nested ? ')' : '');
    }

    /**
     * @param  array<lowercase-string, string> $aliased_classes
     *
     * @return null
     */
    public function toPhpString(
        ?string $namespace,
        array $aliased_classes,
        ?string $this_class,
        int $analysis_php_version_id
    ): ?string {
        return null;
    }

    /**
     * @param  array<lowercase-string, string> $aliased_classes
     *
     */
    public function toNamespacedString(
        ?string $namespace,
        array $aliased_classes,
        ?string $this_class,
        bool $use_phpdoc_format
    ): string {
        if ($use_phpdoc_format) {
            return $this->as->toNamespacedString(
                $namespace,
                $aliased_classes,
                $this_class,
                true
            );
        }

        $intersection_types = $this->getNamespacedIntersectionTypes(
            $namespace,
            $aliased_classes,
            $this_class,
            false
        );

        return $this->param_name . $intersection_types;
    }

    public function getChildNodes(): array
    {
        return [$this->as];
    }

    public function canBeFullyExpressedInPhp(int $analysis_php_version_id): bool
    {
        return false;
    }

    public function replaceTemplateTypesWithArgTypes(
        TemplateResult $template_result,
        ?Codebase $codebase
    ): void {
        $this->replaceIntersectionTemplateTypesWithArgTypes($template_result, $codebase);
    }
}
