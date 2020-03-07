<?php 

namespace nnbao\Press;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Route;

class PressBaseServiceProvider extends ServiceProvider{
	public function boot(){

		$this->registerResources();

		$configs = split_files_with_basename($this->app['files']->glob(__DIR__.'/../config/*.php'));
		foreach($configs as $key => $row){
			$this->publishes([
                __DIR__.'/../config/'.$key.'.php' => config_path($key.'.php'),
            ], $key);
		}

		$this->loadMigrationsFrom(__DIR__.'/../database/migrations');

		$this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'press');

		$this->loadViewsFrom(__DIR__.'/../resources/views', 'press');

		 $this->publishes([
        __DIR__.'/../resources/lang/en' => resource_path('lang/en','press'),
    ]);
	}

	public function register(){

        // require helper file
        foreach(glob(__DIR__.'/../helpers/*.php') as $filename){
        	require_once $filename;
        }
        $configs = split_files_with_basename($this->app['files']->glob(__DIR__.'/../config/*.php'));
        // dd($configs);
        foreach($configs as $key => $row){
			$this->mergeConfigFrom($row, $key);
		}


   
	}
	protected function registerResources(){
		$this->registerRoutes();
	}

	public function registerRoutes(){
		Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
	}

	public function routeConfiguration()
    {
        return [
            'prefix' => 'package',
            'namespace' => 'nnbao\Press\Http\Controllers',
        ];
    }
}