<?php

namespace Psalm\Type;

abstract class TypeVisitor
{
    public const STOP_TRAVERSAL = 1;
    public const DONT_TRAVERSE_CHILDREN = 2;

    /**
     * @template T as TypeNode
     * @param T $type
     * @param-out T $type
     * @return self::STOP_TRAVERSAL|self::DONT_TRAVERSE_CHILDREN|null
     */
    abstract protected function enterNode(TypeNode &$type): ?int;

    /**
     * @template T as TypeNode
     * @param T $node
     * @param-out T $node
     *
     * @psalm-suppress ReferenceConstraintViolation, ConflictingReferenceConstraint
     */
    public function traverse(TypeNode &$node): bool
    {
        $nodeOrig = $node;
        $result = $this->enterNode($node);

        if ($result === ImmutableTypeVisitor::DONT_TRAVERSE_CHILDREN) {
            return true;
        }

        if ($result === ImmutableTypeVisitor::STOP_TRAVERSAL) {
            return false;
        }

        return $node::visitMutable($this, $node, $node !== $nodeOrig);
    }

    /**
     * @template T as array<TypeNode>
     * @param T $nodes
     * @param-out T $nodes
     */
    public function traverseArray(array &$nodes): void
    {
        foreach ($nodes as &$node) {
            if ($this->traverse($node) === false) {
                return;
            }
        }
    }
}
