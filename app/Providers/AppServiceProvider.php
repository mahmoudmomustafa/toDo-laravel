<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //NEW: Import Schema
use Illuminate\Support\Facades\Auth;
use App\Task;

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
        Schema::defaultStringLength(191); //NEW: Increase StringLength
        // pass tasks to all view
        view()->composer('*', function ($view) {
            $incompletedTasks = Task::where(['done' => false, 'user_id' => Auth::id()])->get();
            $completedTasks = Task::where(['done' => true, 'user_id' => Auth::id()])->get();
            $view->with(['incompletedTasks' => $incompletedTasks, 'completedTasks' => $completedTasks]);
        });
    }
}
