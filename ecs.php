<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ControlStructure\NoAlternativeSyntaxFixer;
use PhpCsFixer\Fixer\Whitespace\MethodChainingIndentationFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withPaths([__DIR__ . '/site', __DIR__ . '/public_html/index.php', __DIR__ . '/server.php'])
    ->withSkip([
        __DIR__ . '/site/plugins',
        MethodChainingIndentationFixer::class,
        // Kirby templates use the alternative syntax (if: … endif)
        NoAlternativeSyntaxFixer::class,
    ])
    ->withPreparedSets(psr12: true, common: true, cleanCode: true)
    ->withParallel();
