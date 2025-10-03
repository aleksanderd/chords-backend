<?php

declare(strict_types=1);

use Symplify\MonorepoBuilder\Config\MBConfig;

return static function (MBConfig $mbConfig): void {
    $mbConfig->packageDirectories(array_map(fn ($dir) => __DIR__ . $dir, [
        '/packages/user-domain',
        '/packages/user-symfony',
    ]));
};
