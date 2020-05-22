<?php

namespace DepSimon\LaravelPreset;

use SplFileInfo;
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

    public static function install()
    {
        static::updatePackages();
        static::updateWebpackConfiguration();
        static::updateStyles();
        static::updateScripts();
        static::updateStubs();
    }

    protected static function updatePackageArray(array $packages)
    {
        return static::NPM_PACKAGES_LIST;
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

            collect($filesystem->allFiles(__DIR__ . '/../stubs/resources/css'))
                ->each(function (SplFileInfo $file) use ($filesystem) {
                    $filesystem->copy(
                        $file->getPathname(),
                        resource_path('css') . '/' . $file->getFilename()
                    );
                });
        });
    }

    protected static function updateScripts()
    {
        tap(new Filesystem, function ($filesystem) {
            $filesystem->deleteDirectory(resource_path('js'));

            $filesystem->makeDirectory(resource_path('js'), 0755, true);
        });

        copy(__DIR__ . '/../stubs/resources/js/app.js', resource_path('js/app.js'));
    }

    protected static function updateStubs()
    {
        tap(new Filesystem, function ($filesystem) {
            if (!$filesystem->isDirectory($directory = base_path('stubs'))) {
                $filesystem->makeDirectory(base_path('stubs'), 0755, true);
            }

            collect($filesystem->allFiles(__DIR__ . '/../stubs/app'))
                ->each(function (SplFileInfo $file) use ($filesystem) {
                    $filesystem->copy(
                        $file->getPathname(),
                        base_path('stubs') . '/' . $file->getFilename()
                    );
                });
        });
    }
}
