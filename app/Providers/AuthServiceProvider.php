<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Services\SimpleHasher;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        // add custom guard provider
        Auth::provider('student_provider_driver', function ($app, array $config) {
            return new StudentProvider(new SimpleHasher(), $config['model']);
        });
    }
}
