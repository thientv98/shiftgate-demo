<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(isset($_SERVER['REQUEST_URI'])){
            $uriPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uriSegments = explode('/', trim($uriPath, '/'));

            //dd($uriSegments[0]);
            if($uriSegments[0] == 'apifront'){
                auth()->shouldUse('apifront');
            }else{
                auth()->shouldUse('api');
            }
        }
    }
}
