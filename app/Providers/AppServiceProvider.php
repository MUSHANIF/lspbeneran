<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Auth;
use App\Models\validation;
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
        view()->composer('*',function($view) {
            if (Auth::check() ) {                            
            $view->with('usercek', validation::where('userid',  auth()->user()->id)->first());
        }
        });
        config(['app.locale' => 'id']);
	    Carbon::setLocale('id');

        Gate::define('admin', function(User $user){
            return $user->level === 2;
        });
        Gate::define('user', function(User $user){
            return $user->level === 1;
        });
        Gate::define('superadmin', function(User $user){
            return $user->level === 3;
        });
    }
}
