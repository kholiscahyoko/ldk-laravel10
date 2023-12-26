<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //Access for manage user
        Gate::define('manage-user', function () {
            return $this->has_all_access() || in_array(Auth::user()->role, []);
        });

        //Access for manage master BK
        Gate::define('view-master-bk', function () {
            return $this->has_all_access() || in_array(Auth::user()->role, ['ehs', 'waho', 'purchasing']);
        });
        Gate::define('manage-master-bk', function () {
            return $this->has_all_access() || in_array(Auth::user()->role, ['ehs', 'purchasing']);
        });

        //Access for manage Characteristic
        Gate::define('manage-characteristic', function () {
            return $this->has_all_access() || in_array(Auth::user()->role, ['ehs']);
        });

        //Access for manage Location
        Gate::define('view-location', function () {
            return $this->has_all_access() || in_array(Auth::user()->role, ['ehs', 'waho']);
        });
        Gate::define('manage-location', function () {
            return $this->has_all_access() || in_array(Auth::user()->role, ['waho']);
        });

        //Access for manage LDK
        Gate::define('view-ldk', function () {
            return $this->has_all_access() || in_array(Auth::user()->role, ['ehs', 'waho', 'purchasing', 'other']);
        });
        Gate::define('manage-ldk', function () {
            return $this->has_all_access() || in_array(Auth::user()->role, ['ehs', 'purchasing']);
        });
    }

    //All access
    function has_all_access(): bool {
        return in_array(Auth::user()->role, ['super']);
    }
}
