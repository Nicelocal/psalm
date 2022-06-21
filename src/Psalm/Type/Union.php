<?php

namespace Psalm\Type;

use InvalidArgumentException;
use Psalm\CodeLocation;
use Psalm\Codebase;
use Psalm\Internal\DataFlow\DataFlowNode;
use Psalm\Internal\Type\TypeCombiner;
use Psalm\Internal\TypeVisitor\ContainsClassLikeVisitor;
use Psalm\Internal\TypeVisitor\ContainsLiteralVisitor;
use Psalm\Internal\TypeVisitor\FromDocblockSetter;
use Psalm\Internal\TypeVisitor\TemplateTypeCollector;
use Psalm\Internal\TypeVisitor\TypeChecker;
use Psalm\Internal\TypeVisitor\TypeScanner;
use Psalm\StatementsSource;
use Psalm\Storage\FileStorage;
use Psalm\Type;
use Psalm\Type\Atomic\Scalar;
use Psalm\Type\Atomic\TArray;
use Psalm\Type\Atomic\TCallable;
use Psalm\Type\Atomic\TClassString;
use Psalm\Type\Atomic\TClassStringMap;
use Psalm\Type\Atomic\TClosure;
use Psalm\Type\Atomic\TConditional;
use Psalm\Type\Atomic\TEmptyMixed;
use Psalm\Type\Atomic\TFalse;
use Psalm\Type\Atomic\TFloat;
use Psalm\Type\Atomic\TInt;
use Psalm\Type\Atomic\TIntRange;
use Psalm\Type\Atomic\TList;
use Psalm\Type\Atomic\TLiteralFloat;
use Psalm\Type\Atomic\TLiteralInt;
use Psalm\Type\Atomic\TLiteralString;
use Psalm\Type\Atomic\TLowercaseString;
use Psalm\Type\Atomic\TMixed;
use Psalm\Type\Atomic\TNamedObject;
use Psalm\Type\Atomic\TNonEmptyLowercaseString;
use Psalm\Type\Atomic\TNonspecificLiteralInt;
use Psalm\Type\Atomic\TNonspecificLiteralString;
use Psalm\Type\Atomic\TString;
use Psalm\Type\Atomic\TTemplateParam;
use Psalm\Type\Atomic\TTemplateParamClass;
use Psalm\Type\Atomic\TTrue;

use function array_filter;
use function array_merge;
use function array_unique;
use function count;
use function get_class;
use function implode;
use function ksort;
use function reset;
use function sort;
use function strpos;

/**
 * @psalm-immutable
 */
final class Union implements TypeNode
{
    use UnionTrait;

    /**
     * @var non-empty-array<string, Atomic>
     */
    private $types;

    /**
     * Whether the type originated in a docblock
     *
     * @var bool
     */
    public $from_docblock = false;

    /**
     * Whether the type originated from integer calculation
     *
     * @var bool
     */
    public $from_calculation = false;

    /**
     * Whether the type originated from a property
     *
     * This helps turn isset($foo->bar) into a different sort of issue
     *
     * @var bool
     */
    public $from_property = false;

    /**
     * Whether the type originated from *static* property
     *
     * Unlike non-static properties, static properties have no prescribed place
     * like __construct() to be initialized in
     *
     * @var bool
     */
    public $from_static_property = false;

    /**
     * Whether the property that this type has been derived from has been initialized in a constructor
     *
     * @var bool
     */
    public $initialized = true;

    /**
     * Which class the type was initialised in
     *
     * @var ?string
     */
    public $initialized_class;

    /**
     * Whether or not the type has been checked yet
     *
     * @var bool
     */
    public $checked = false;

    /**
     * @var bool
     */
    public $failed_reconciliation = false;

    /**
     * Whether or not to ignore issues with possibly-null values
     *
     * @var bool
     */
    public $ignore_nullable_issues = false;

    /**
     * Whether or not to ignore issues with possibly-false values
     *
     * @var bool
     */
    public $ignore_falsable_issues = false;

    /**
     * Whether or not to ignore issues with isset on this type
     *
     * @var bool
     */
    public $ignore_isset = false;

    /**
     * Whether or not this variable is possibly undefined
     *
     * @var bool
     */
    public $possibly_undefined = false;

    /**
     * Whether or not this variable is possibly undefined
     *
     * @var bool
     */
    public $possibly_undefined_from_try = false;

    /**
     * Whether or not this union comes from a template "as" default
     *
     * @var bool
     */
    public $from_template_default = false;

    /**
     * @var array<string, TLiteralString>
     */
    private $literal_string_types = [];

    /**
     * @var array<string, TClassString>
     */
    private $typed_class_strings = [];

    /**
     * @var array<string, TLiteralInt>
     */
    private $literal_int_types = [];

    /**
     * @var array<string, TLiteralFloat>
     */
    private $literal_float_types = [];

    /**
     * True if the type was passed or returned by reference, or if the type refers to an object's
     * property or an item in an array. Note that this is not true for locally created references
     * that don't refer to properties or array items (see Context::$references_in_scope).
     *
     * @var bool
     */
    public $by_ref = false;

    /**
     * @var bool
     */
    public $reference_free = false;

    /**
     * @var bool
     */
    public $allow_mutations = true;

    /**
     * @var bool
     */
    public $has_mutations = true;

    /**
     * This is a cache of getId on non-exact mode
     * @var null|string
     */
    private $id;

    /**
     * This is a cache of getId on exact mode
     * @var null|string
     */
    private $exact_id;


    /**
     * @var array<string, DataFlowNode>
     */
    public $parent_nodes = [];

    /**
     * @var bool
     */
    public $different = false;

    /**
     * @deprecated In psalm v5, Unions are immutable and thus cloning them is pointless, use MutableUnions to build new unions.
     */
    public function __clone()
    {
        throw new \RuntimeException('Cloning is disallowed!');
    }
}
