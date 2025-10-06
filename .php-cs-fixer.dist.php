<?php

declare(strict_types=1);

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude(['var', 'gitlab', 'vendor', 'tests/Support/_generated'])
;

return (new PhpCsFixer\Config())
    ->setFinder($finder)
    ->setRules([
        '@PSR12' => true,
        '@Symfony' => true,
        'declare_strict_types' => true,
        'concat_space' => ['spacing' => 'one'],
        'method_chaining_indentation' => true,
        'braces' => ['position_after_functions_and_oop_constructs' => 'next'],
    ])
;
