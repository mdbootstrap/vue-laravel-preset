<?php

namespace MDBVue\LaravelPreset;

use Illuminate\Foundation\Console\Presets\Preset as LaravelPreset;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;

class Preset extends LaravelPreset

{

    /**
   * Install the preset.
   *
   * @return void
   */

  public static function install()

  {

    static::ensureComponentDirectoryExists();
    static::updatePackages();
    static::updateWebpackConfiguration();
    static::updateImports();
    static::updateComponent();
    static::removeNodeModules();
    static::updateMainPage();

  }

  // public static function updatePackageArray($packages)

  // {

  //   return ['mdbvue' => '^6.3.0'] + Arr::except($packages, []);

  // }

  
     /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return ['vue' => '^2.6.11', 'mdbvue' => '^6.3.0'] + Arr::except($packages, [
            '@babel/preset-react',
            'react',
            'react-dom',
        ]);
    }

    /**
     * Update the Webpack configuration.
     *
     * @return void
     */
    protected static function updateWebpackConfiguration()
    {
        copy(__DIR__.'/mdb-stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    /**
     * Update the example component.
     *
     * @return void
     */
    protected static function updateComponent()
    {
        (new Filesystem)->delete(
            resource_path('js/components/Example.js')
        );

        copy(
            __DIR__.'/mdb-stubs/ExampleComponent.vue',
            resource_path('js/components/ExampleComponent.vue')
        );
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateImports()
    {
        copy(__DIR__.'/mdb-stubs/app.js', resource_path('js/app.js'));
    }

    protected static function updateMainPage()
    {
        copy(__DIR__.'/mdb-stubs/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }
  

}