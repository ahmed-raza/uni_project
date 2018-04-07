<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        FormFacade::macro('range', function($name, $value, array $attributes){
            if (isset($_GET[$name])) {
                $value = $_GET[$name];
            }
            return '<input
                type="range"
                name="'.$name.'"
                value="'.$value.'"
                id="'.$attributes['id'].'"
                min="'.$attributes['min'].'"
                max="'.$attributes['max'].'"
                step="'.$attributes['step'].'">';
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
