<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\PeopleController;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);
        Carbon::setLocale('zh');
        
        session_start();


        View()->composer('home.people.*', function($view) {
            $people = new PeopleController();

            // 获取当前登录用户的信息
            $user = $people->getUser();
            $view->with('user', $user);

            // 获取数量
            $count = $people->getCount();
            $view->with('count', $count);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
