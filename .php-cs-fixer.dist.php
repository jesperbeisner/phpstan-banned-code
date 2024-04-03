<?php

declare(strict_types=1);

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude(['vendor', 'snippets']);

return (new PhpCsFixer\Config())
    ->setUsingCache(false)
    ->setRiskyAllowed(true)
    ->setFinder($finder)
    ->setRules([
        'array_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'binary_operator_spaces' => ['default' => 'align', 'operators' => ['=>' => 'align', '=' => 'align_single_space']],
        'blank_line_after_namespace' => true,
        'blank_line_after_opening_tag' => true,
        'declare_strict_types' => true,
        'indentation_type' => true,
        'linebreak_after_opening_tag' => true,
        'constant_case' => true,
        'lowercase_keywords' => true,
        'class_attributes_separation' => ['elements' => ['method' => 'one']],
        'native_function_invocation' => ['include' => ['@compiler_optimized']],
        'no_alias_functions' => true,
        'no_closing_tag' => true,
        'no_extra_blank_lines' => [
            'tokens' => [
                'break',
                'continue',
                'curly_brace_block',
                'extra',
                'parenthesis_brace_block',
                'return',
                'square_brace_block',
                'throw',
                'use',
            ],
        ],
        'echo_tag_syntax' => ['format' => 'long'],
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ordered_imports' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order' => true,
        'semicolon_after_instruction' => true,
        'visibility_required' => [
            'elements' => ['method', 'property', 'const'],
        ],
    ]);
