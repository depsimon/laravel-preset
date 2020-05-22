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

            $command->comment('Please run "yarn && yarn dev" to compile your new assets.');
        });
    }
}
