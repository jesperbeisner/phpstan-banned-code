<?php

declare(strict_types=1);

namespace Jesperbeisner\PHPStanBannedCode\Rules;

use PhpParser\Node;
use PhpParser\Node\Expr\FuncCall;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;

/**
 * @implements Rule<FuncCall>
 */
final class BannedFunctionsRule implements Rule
{
    /**
     * @param array<array{name: string, active: bool}> $bannedFunctions
     */
    public function __construct(
        private readonly array $bannedFunctions
    ) {
    }

    public function getNodeType(): string
    {
        return FuncCall::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if (!$node instanceof FuncCall) {
            return [];
        }

        $function = $node->name->toString();

        foreach ($this->bannedFunctions as $bannedFunction) {
            if ($bannedFunction['name'] === $function && $bannedFunction['active'] === true) {
                return [sprintf('Should not use function "%s", please change the code.', $function)];
            }
        }

        return [];
    }
}
