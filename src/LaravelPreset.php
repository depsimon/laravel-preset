<?php

namespace DepSimon\LaravelPreset;

use SplFileInfo;
use Illuminate\Support\Arr;
use Laravel\Ui\Presets\Preset;
use Illuminate\Filesystem\Filesystem;

class LaravelPreset extends Preset
{
    const NPM_PACKAGES_LIST = [
        "autoprefixer" => "^9.7.6",
        "browser-sync" => "^2.26.7",
        "browser-sync-webpack-plugin" => "^2.2.2",
        "cross-env" => "^7.0",
        "laravel-mix" => "^5.0.1",
        "postcss-import" => "^12.0.1",
        "postcss-nested" => "^4.2.1",
        "postcss-url" => "^8.0.0",
        "resolve-url-loader" => "^3.1.0",
        "tailwindcss" => "^1.4.6",
        "vue-template-compiler" => "^2.6.11"
    ];

    const COMPOSER_PACKAGES_TO_ADD = [];
    const COMPOSER_PACKAGES_TO_REMOVE = [];

    const COMPOSER_DEV_PACKAGES_TO_ADD = [
        "nunomaduro/collision" => "^5.0",
        "pestphp/pest" => "^0.1.2",
        "phpunit/phpunit" => "^9.0"
    ];
    const COMPOSER_DEV_PACKAGES_TO_REMOVE = [];

    public static function install()
    {
        static::updatePackages();
        static::updateWebpackConfiguration();
        static::updateStyles();
        static::updateScripts();
        static::updateViews();
        static::updateStubs();
        static::updateComposerPackages();
        self::exportAppStubs();
        self::exportMigration();
    }

    protected static function updatePackageArray(array $packages)
    {
        return static::NPM_PACKAGES_LIST;
    }

    protected static function updateComposerPackageArray(array $packages, $dev = true)
    {
        return array_merge(
            Arr::except($packages, $dev ? static::COMPOSER_DEV_PACKAGES_TO_REMOVE : static::COMPOSER_PACKAGES_TO_REMOVE),
            $dev ? static::COMPOSER_DEV_PACKAGES_TO_ADD : static::COMPOSER_PACKAGES_TO_ADD,
        );
    }

    protected static function updateWebpackConfiguration()
    {
        copy(__DIR__ . '/../stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    protected static function updateStyles()
    {
        tap(new Filesystem, function ($filesystem) {
            $filesystem->deleteDirectory(resource_path('sass'));

            if (!$filesystem->isDirectory($directory = resource_path('css'))) {
                $filesystem->makeDirectory($directory, 0755, true);
            }

            $filesystem->copyDirectory(__DIR__ . '/../stubs/resources/css', resource_path('css'));

            copy(__DIR__ . '/../stubs/tailwind.config.js', base_path('tailwind.config.js'));
        });
    }

    protected static function updateScripts()
    {
        tap(new Filesystem, function ($filesystem) {
            $filesystem->deleteDirectory(resource_path('js'));

            $filesystem->makeDirectory(resource_path('js'), 0755, true);

            $filesystem->copyDirectory(__DIR__ . '/../stubs/resources/js', resource_path('js'));
        });
    }

    protected static function updateViews()
    {
        tap(new Filesystem, function ($filesystem) {
            $filesystem->copyDirectory(__DIR__ . '/../stubs/resources/views', resource_path('views'));
        });
    }

    protected static function updateStubs()
    {
        tap(new Filesystem, function ($filesystem) {
            if (!$filesystem->isDirectory($directory = base_path('stubs'))) {
                $filesystem->makeDirectory(base_path('stubs'), 0755, true);
            }

            collect($filesystem->allFiles(__DIR__ . '/../stubs/app-stubs'))
                ->each(function (SplFileInfo $file) use ($filesystem) {
                    $filesystem->copy(
                        $file->getPathname(),
                        base_path('stubs') . '/' . $file->getFilename()
                    );
                });
        });
    }

    protected static function updateComposerPackages()
    {
        if (!file_exists(base_path('composer.json'))) {
            return;
        }

        $packages = json_decode(file_get_contents(base_path('composer.json')), true);

        foreach ([true, false] as $dev) {
            $configurationKey = $dev ? 'require-dev' : 'require';

            $packages[$configurationKey] = static::updateComposerPackageArray(
                array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
                $dev
            );

            ksort($packages[$configurationKey]);
        }

        // Register helpers
        $packages["autoload"]["files"] = [
            "bootstrap/helpers.php"
        ];

        file_put_contents(
            base_path('composer.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );
    }

    protected static function exportAppStubs()
    {
        tap(new Filesystem, function ($filesystem) {
            $filesystem->copyDirectory(__DIR__ . '/../stubs/root', base_path());
        });
    }

    protected static function exportMigration()
    {
        copy(
            __DIR__ . '/../stubs/migrations/create_password_resets_table.php',
            base_path('database/migrations/' . date('Y_m_d') . '_000000_create_password_resets_table.php')
        );
    }
}
