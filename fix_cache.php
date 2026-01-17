<?php

// Workaround for PHP is_writable() bug on Windows with paths containing spaces
// This script manually generates the cache files that Laravel needs

$basePath = __DIR__;
$cachePath = $basePath . '/bootstrap/cache';

// Ensure cache directory exists
if (!is_dir($cachePath)) {
    mkdir($cachePath, 0755, true);
}

// Generate packages.php
echo "Generating packages.php...\n";
$packagesFile = $cachePath . '/packages.php';

// Read composer installed.json to get packages
$installedPath = $basePath . '/vendor/composer/installed.json';
if (file_exists($installedPath)) {
    $installed = json_decode(file_get_contents($installedPath), true);
    $packages = $installed['packages'] ?? $installed;
    
    $manifest = [];
    foreach ($packages as $package) {
        if (isset($package['extra']['laravel'])) {
            $name = str_replace($basePath . '/vendor/', '', $package['name']);
            $manifest[$name] = $package['extra']['laravel'];
        }
    }
    
    file_put_contents($packagesFile, '<?php return ' . var_export($manifest, true) . ';');
    echo "Created $packagesFile\n";
} else {
    file_put_contents($packagesFile, '<?php return [];');
    echo "Created empty $packagesFile\n";
}

// Generate services.php
echo "Generating services.php...\n";
$servicesFile = $cachePath . '/services.php';
$servicesManifest = [
    'providers' => [],
    'eager' => [],
    'deferred' => []
];
file_put_contents($servicesFile, '<?php return ' . var_export($servicesManifest, true) . ';');
echo "Created $servicesFile\n";

echo "\nCache files generated successfully!\n";
echo "You can now run: composer dump-autoload\n";
