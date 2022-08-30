<?php

namespace Psalm\Type\Atomic;

use Psalm\Codebase;
use Psalm\Internal\Analyzer\StatementsAnalyzer;
use Psalm\Internal\Type\TemplateInferredTypeReplacer;
use Psalm\Internal\Type\TemplateResult;
use Psalm\Internal\Type\TemplateStandinTypeReplacer;
use Psalm\Type\Atomic;
use Psalm\Type\Union;

use function array_keys;
use function array_map;
use function array_merge;
use function array_values;
use function count;
use function implode;

/**
 * Denotes an object with specified member variables e.g. `object{foo:int, bar:string}`.
 */
final class TObjectWithProperties extends TObject
{
    use HasIntersectionTrait;

    /**
     * @var array<string|int, Union>
     */
    public $properties;

    /**
     * @var array<string, string>
     */
    public $methods;

    /**
     * Constructs a new instance of a generic type
     *
     * @param array<string|int, Union> $properties
     * @param array<string, string> $methods
     * @param array<string, TNamedObject|TTemplateParam|TIterable|TObjectWithProperties> $extra_types
     */
    public function __construct(array $properties, array $methods = [], array $extra_types = [])
    {
        $this->properties = $properties;
        $this->methods = $methods;
        $this->extra_types = $extra_types;
    }

    public function getId(bool $exact = true, bool $nested = false): string
    {
        $extra_types = '';

        if ($this->extra_types) {
            $extra_types = '&' . implode('&', $this->extra_types);
        }

        $properties_string = implode(
            ', ',
            array_map(
                /**
                 * @param  string|int $name
                 */
                static fn($name, Union $type): string => $name . ($type->possibly_undefined ? '?' : '') . ':'
                    . $type->getId($exact),
                array_keys($this->properties),
                $this->properties
            )
        );

        $methods_string = implode(
            ', ',
            array_map(
                static fn(string $name): string => $name . '()',
                array_keys($this->methods)
            )
        );

        return 'object{'
            . $properties_string . ($methods_string && $properties_string ? ', ' : '')
            . $methods_string
            . '}' . $extra_types;
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
            return 'object';
        }

        return 'object{' .
                implode(
                    ', ',
                    array_map(
                        /**
                         * @param  string|int $name
                         */
                        static fn($name, Union $type): string =>
                            $name .
                            ($type->possibly_undefined ? '?' : '')
                            . ':'
                            . $type->toNamespacedString(
                                $namespace,
                                $aliased_classes,
                                $this_class,
                                false
                            ),
                        array_keys($this->properties),
                        $this->properties
                    )
                ) .
                '}';
    }

    /**
     * @param  array<lowercase-string, string> $aliased_classes
     */
    public function toPhpString(
        ?string $namespace,
        array $aliased_classes,
        ?string $this_class,
        int $analysis_php_version_id
    ): string {
        return $this->getKey();
    }

    public function canBeFullyExpressedInPhp(int $analysis_php_version_id): bool
    {
        return false;
    }

    public function __clone()
    {
        foreach ($this->properties as &$property) {
            $property = clone $property;
        }
    }

    public function equals(Atomic $other_type, bool $ensure_source_equality): bool
    {
        if (!$other_type instanceof self) {
            return false;
        }

        if (count($this->properties) !== count($other_type->properties)) {
            return false;
        }

        if ($this->methods !== $other_type->methods) {
            return false;
        }

        foreach ($this->properties as $property_name => $property_type) {
            if (!isset($other_type->properties[$property_name])) {
                return false;
            }

            if (!$property_type->equals($other_type->properties[$property_name], $ensure_source_equality)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return static
     */
    public function replaceTemplateTypesWithStandins(
        TemplateResult $template_result,
        Codebase $codebase,
        ?StatementsAnalyzer $statements_analyzer = null,
        ?Atomic $input_type = null,
        ?int $input_arg_offset = null,
        ?string $calling_class = null,
        ?string $calling_function = null,
        bool $replace = true,
        bool $add_lower_bound = false,
        int $depth = 0
    ): self {
        $properties = [];

        foreach ($this->properties as $offset => $property) {
            $input_type_param = null;

            if ($input_type instanceof TKeyedArray
                && isset($input_type->properties[$offset])
            ) {
                $input_type_param = $input_type->properties[$offset];
            }

            $properties[$offset] = TemplateStandinTypeReplacer::replace(
                $property,
                $template_result,
                $codebase,
                $statements_analyzer,
                $input_type_param,
                $input_arg_offset,
                $calling_class,
                $calling_function,
                $replace,
                $add_lower_bound,
                null,
                $depth
            );
        }

        $intersection = $this->replaceIntersectionTemplateTypesWithStandins(
            $template_result,
            $codebase,
            $statements_analyzer,
            $input_type,
            $input_arg_offset,
            $calling_class,
            $calling_function,
            $replace,
            $add_lower_bound,
            $depth
        );
        if ($properties === $this->properties && !$intersection) {
            return $this;
        }
        return new static($properties, $this->methods, $intersection ?? $this->extra_types);
    }

    /**
     * @return static
     */
    public function replaceClassLike(string $old, string $new): self
    {
        $properties = $this->properties;
        foreach ($properties as &$property) {
            $property = $property->replaceClassLike($old, $new);
        }
        $intersection = $this->replaceIntersectionClassLike($old, $new);
        if (!$intersection && $properties === $this->properties) {
            return $this;
        }
        return new static(
            $properties,
            $this->methods,
            $intersection ?? $this->extra_types
        );
    }
    /**
     * @return static
     */
    public function replaceTemplateTypesWithArgTypes(
        TemplateResult $template_result,
        ?Codebase $codebase
    ): self {
        $properties = $this->properties;
        foreach ($this->properties as &$property) {
            $property = TemplateInferredTypeReplacer::replace(
                $property,
                $template_result,
                $codebase
            );
        }
        $intersection = $this->replaceIntersectionTemplateTypesWithArgTypes(
            $template_result,
            $codebase
        );
        if ($properties === $this->properties && !$intersection) {
            return $this;
        }
        return new static(
            $properties,
            $this->methods,
            $intersection ?? $this->extra_types
        );
    }

    public function getChildNodes(): array
    {
        return array_merge($this->properties, array_values($this->extra_types));
    }

    public function getAssertionString(): string
    {
        return $this->getKey();
    }
}
