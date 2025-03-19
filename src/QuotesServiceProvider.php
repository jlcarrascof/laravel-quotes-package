<?php
namespace Jjmartinezf\Quotes;

use Illuminate\Support\ServiceProvider;

class QuotesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/quotes.php' => config_path('quotes.php'),
        ], 'config');

        $this->loadRoutesFrom(__DIR__.'/Routes/api.php');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/quotes.php', 'quotes');
    }
}
