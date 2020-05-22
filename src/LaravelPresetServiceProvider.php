<?php

namespace DepSimon\LaravelPreset;

use Laravel\Ui\UiCommand;
use Illuminate\Support\ServiceProvider;

class LaravelPresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        UiCommand::macro('depsimon', function ($command) {
            LaravelPreset::install();

            if ($command->confirm('Do you wish to compile the frontend assets?', true)) {
                exec('yarn --silent && yarn dev');
            }
            if ($command->confirm('Do you wish to update your composer dependencies ?', true)) {
                exec('composer dump-autoload && composer update');
            }
        });
    }
}
