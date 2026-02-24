<?php

declare(strict_types=1);

namespace agenturkopfnuss\ContaoElementGroupGrid;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class ContaoElementGroupGrid extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $containerConfigurator, ContainerBuilder $containerBuilder): void
    {
        $services = $containerConfigurator->services();
        $services
            ->defaults()
                ->autoconfigure()
                ->autowire()
        ;

        $services
            ->load('agenturkopfnuss\\ContaoElementGroupGrid\\', './')
            ->exclude([
                'ContaoManager',
                'ContaoElementGroupGrid.php',
            ])
        ;
    }
}
