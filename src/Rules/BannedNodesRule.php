<?php

declare(strict_types=1);

namespace Jesperbeisner\PHPStanBannedCode\Rules;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;

/**
 * @implements Rule<Node>
 */
final class BannedNodesRule implements Rule
{
    /**
     * @param array<int, array{type: string, active: bool}> $bannedNodes
     */
    public function __construct(
        private readonly array $bannedNodes
    ) {
    }

    public function getNodeType(): string
    {
        return Node::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        $type = $node->getType();

        foreach ($this->bannedNodes as $bannedNode) {
            if ($bannedNode['type'] === $type && $bannedNode['active'] === true) {
                return [sprintf('Should not use node with type "%s", please change the code.', $type)];
            }
        }

        return [];
    }
}
