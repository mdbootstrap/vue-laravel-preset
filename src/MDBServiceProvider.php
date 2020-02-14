<?php

namespace MDBVue\LaravelPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class MDBServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        PresetCommand::macro('mdbvue', function ($command) 
        {
            Preset::install();

            $command->info('Vue & MDB Preset has been added to your project. Compile your assets and start creating!');
        });
    }
}
