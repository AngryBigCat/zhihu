<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Http\Controllers\PeopleController;
use Auth;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        session_start();

        View::composer('home.people.*', function($view) {
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
