<?php

namespace MDBVue\LaravelPreset;

use Illuminate\Foundation\Console\Presets\Preset as LaravelPreset;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;

class Preset extends LaravelPreset

{

    static $package;
    static $token;

    public function __construct(string $package, string $token)

    {   

        self::$package = $package;
        self::$token = $token;

    }
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
  
     /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */



    protected static function updatePackageArray(array $packages)
    {

        if (self::$package == 'pro') {
            $source = 'git+https://oauth2:' . self::$token . '@git.mdbootstrap.com/mdb/vue/vu-pro.git';
        }
        else {
            $source =  'mdbootstrap/Vue-Bootstrap-with-Material-Design';
        }

        return ['vue' => '^2.6.11', 'mdbvue' => $source] + Arr::except($packages, [
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