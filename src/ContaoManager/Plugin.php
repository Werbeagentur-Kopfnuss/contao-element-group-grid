<?php

declare(strict_types=1);

namespace agenturkopfnuss\ContaoElementGroupGrid\ContaoManager;

use agenturkopfnuss\ContaoElementGroupGrid\ContaoElementGroupGrid;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(ContaoElementGroupGrid::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
