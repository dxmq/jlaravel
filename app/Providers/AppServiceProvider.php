<?php

namespace App\Providers;

use App\Models\Topic;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        if (request()->is('admin/*')) {
            config(['auth.defaults.guard' => 'admin']);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('layouts._sidebar', function($view) {
            $topics = Topic::withCount('posts')->get();
            $view->with('topics', $topics);
        });
    }
}
