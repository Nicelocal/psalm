<?php

namespace Psalm\Type\Atomic;

use Psalm\Codebase;
use Psalm\Internal\Type\TemplateInferredTypeReplacer;
use Psalm\Internal\Type\TemplateResult;
use Psalm\Type\Atomic;
use Psalm\Type\Union;

/**
 * Internal representation of a conditional return type in phpdoc. For example ($param1 is int ? int : string)
 */
final class TConditional extends Atomic
{
    public function __construct(
        public readonly string $param_name,
        public readonly string $defining_class,
        public readonly Union $as_type,
        public readonly Union $conditional_type,
        public readonly Union $if_type,
        public readonly Union $else_type
    ) {
    }

    public function getKey(bool $include_extra = true): string
    {
        return 'TConditional<' . $this->param_name . '>';
    }

    public function getAssertionString(): string
    {
        return '';
    }

    public function getId(bool $exact = true, bool $nested = false): string
    {
        return '('
            . $this->param_name
            . ' is ' . $this->conditional_type->getId($exact)
            . ' ? ' . $this->if_type->getId($exact)
            . ' : ' . $this->else_type->getId($exact)
            . ')';
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
        return '';
    }

    public function getChildNodes(): array
    {
        return [$this->conditional_type, $this->if_type, $this->else_type];
    }

    public function canBeFullyExpressedInPhp(int $analysis_php_version_id): bool
    {
        return false;
    }

    public function replaceTemplateTypesWithArgTypes(
        TemplateResult $template_result,
        ?Codebase $codebase
    ): void {
        TemplateInferredTypeReplacer::replace(
            $this->conditional_type,
            $template_result,
            $codebase
        );
    }
}
