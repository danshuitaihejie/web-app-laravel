<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
		/**
		解决类似问题：Illuminate\Database\QueryException
  SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; 
  max key length is 1000 bytes (SQL: alter table `users` add unique `users_email_unique`(`email`))
  参见：https://laravel.com/docs/master/migrations#creating-indexes
		 */
		Schema::defaultStringLength(191);
      
    }
}
