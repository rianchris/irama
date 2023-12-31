<?php

namespace App\Providers;

use App\Models\User;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('superadmin', function (User $user) {
            return $user->myprofile->role == 'superadmin';
        });
        Gate::define('admin', function (User $user) {
            return $user->myprofile->role == 'admin';
        });
        Gate::define('mitra', function (User $user) {
            return $user->myprofile->role == 'mitra';
        });
        Gate::define('warga', function (User $user) {
            return $user->myprofile->role == 'warga';
        });
    }
}
