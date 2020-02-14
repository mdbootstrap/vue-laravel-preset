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

  public static function install($package, $token)

  {

    static::ensureComponentDirectoryExists();
    static::updateVuePackages(false, $package, $token);
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

    static function updateVuePackages($dev = true, $package, $token)
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = static::updatePackageArray(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $package,
            $token
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }

    protected static function updatePackageArray(array $packages, $package, $token)
    {

        if ($package == 'pro') {
            $source = 'git+https://oauth2:' . $token . '@git.mdbootstrap.com/mdb/vue/vu-pro.git';
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