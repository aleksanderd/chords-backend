<?php

declare(strict_types=1);

use Symplify\MonorepoBuilder\Config\MBConfig;

return static function (MBConfig $config): void {
    $config->packageDirectories(array_map(fn ($dir) => __DIR__ . $dir, [
        '/apps/demo',
        '/packages/core-domain',
        '/packages/core-symfony',
        '/packages/user-domain',
    ]));

    $config->dataToAppend([
        'minimum-stability' => 'dev',
        'prefer-stable' => true,
    ]);
};
