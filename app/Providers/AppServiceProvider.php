<?php

namespace App\Providers;

use App\Models\Diagram;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Modules\Common\UserObserver;
use App\Modules\Common\DiagramObserver;
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
		Schema::defaultStringLength(125);
        User::observe(UserObserver::class);
        Diagram::observe(DiagramObserver::class);
    }
}
