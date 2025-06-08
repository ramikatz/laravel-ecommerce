<?php

namespace App\Providers;

use App\Models\Review;
use App\Policies\ReviewPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Review' => 'App\Policies\ReviewPolicy',
        Review::class => ReviewPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('keymaster-user', function ($user) {
            return $user->hasRole('keymaster');
        });
        Gate::define('super-dashboard-users', function ($user) {
            return $user->hasAnyRoles(['admin', 'keymaster']);
        });
        Gate::define('normal-dashboard-users', function ($user) {
            return $user->hasAnyRoles(['admin', 'keymaster', 'staff']);
        });
        Gate::define('thirdparty-dashboard-users', function ($user) {
            return $user->hasAnyRoles(['supplier', 'keymaster', 'staff', 'admin']);
        });
        Gate::define('frontend-users', function ($user) {
            return $user->hasAnyRoles(['admin', 'keymaster', 'staff', 'customer', 'supplier']);
        });
        Gate::define('all-users', function ($user) {
            return $user->hasAnyRoles(['admin', 'keymaster', 'staff', 'customer', 'supplier']);
        });
        Gate::define('supplier-users', function ($user) {
            return $user->hasAnyRoles(['supplier']);
        });
    }
}




/*         Gate::define('manage-users', function ($user) {
            return $user->hasAnyRoles(['admin', 'author']);
        });
        Gate::define('edit-users', function ($user) {
            return $user->hasAnyRoles(['admin', 'author']);
        });
        Gate::define('delete-users', function ($user) {
            return $user->hasRole('admin');
        }); */