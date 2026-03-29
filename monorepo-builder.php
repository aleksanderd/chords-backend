<?php

declare(strict_types=1);

use Symplify\MonorepoBuilder\Config\MBConfig;

return static function (MBConfig $config): void {
    $config->packageDirectories(array_map(fn ($dir) => __DIR__ . $dir, [
        '/apps/demo',
        '/packages/core',
        '/packages/user',
    ]));

    $config->dataToAppend([
        'minimum-stability' => 'dev',
        'prefer-stable' => true,
    ]);
};
