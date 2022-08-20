<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Municipality;
use App\Models\Equipment;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
       
        Gate::define('update-equipment', fn(User $user, Equipment $equipment) => $user->municipality_id == $equipment->municipality_id);
        Gate::define('municipality', fn(User $user) =>  $user->role ==  'municipality');
        Gate::define('province', fn(User $user) => $user->role == 'province');
    }
}
