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

            if ($command->option('auth')) {
                $command->callSilent('ui:controllers');

                LaravelPreset::installAuth();

                $command->info('Auth scaffolding installed successfully.');
            }

            if ($command->confirm('Do you wish to compile the frontend assets?', true)) {
                exec('yarn --silent');
                exec('yarn dev');
            }
            if ($command->confirm('Do you wish to update your composer dependencies ?', true)) {
                exec('composer dump-autoload');
                exec('composer update');
            }
        });
    }
}
