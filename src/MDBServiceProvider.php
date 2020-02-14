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
            $package = $command->anticipate('Do you want to install pro or free version? (f - free, p - pro)', ['free', 'pro']);

            if ($package == 'pro')

            {

                $token = $command->ask('Enter your Gitlab token');

            }

            else

            {

                $token = null;

            }

            Preset::install($package, $token);

            $command->info('Vue & MDB Preset has been added to your project. Compile your assets and start creating!');
        });
    }
}
