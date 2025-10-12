<?php

declare(strict_types=1);

namespace Chords\Core;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class CoreBundle extends AbstractBundle
{
    /**
     * @param array<mixed> $config
     */
    public function loadExtension(
        array $config,
        ContainerConfigurator $container,
        ContainerBuilder $builder,
    ): void {
        $container->import('../config/services.yaml');
    }

    public function build(ContainerBuilder $container): void
    {
        $entityDir = realpath(__DIR__ . '/Infrastructure/Entity');
        $namespace = 'Chords\Core\Infrastructure\Entity';
        $ormMappingPass = DoctrineOrmMappingsPass::createAttributeMappingDriver([$namespace], [$entityDir]);
        $container->addCompilerPass($ormMappingPass);
    }
}
