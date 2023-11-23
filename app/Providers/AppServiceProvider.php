<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        Gate::define('admin', function (User $user) {
            return $user->roles->firstWhere('name', 'Admin') !== null;
        });
        
        Gate::define('pbj', function (User $user) {
            return $user->roles->firstWhere('name', 'PBJ') !== null;
        });
        
        Gate::define('ppk', function (User $user) {
            return $user->roles->firstWhere('name', 'PPK') !== null;
        });        
    }
}
