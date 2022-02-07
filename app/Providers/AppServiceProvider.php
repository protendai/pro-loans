<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Convert currencies
        Blade::directive('convert', function ($money) {
            return "<?php echo number_format($money, 2); ?>";
        });
       

        // Convert Date
        Blade::directive('longdate', function ($date) {
            return "<?php echo date('d-F-Y',strtotime($date)); ?>";
        });
    }
}
