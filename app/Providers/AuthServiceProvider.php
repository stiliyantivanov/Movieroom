<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Actor' => 'App\Policies\ActorPolicy',
        // 'App\Movie' => 'App\Policies\MoviePolicy',
        // 'App\Review' => 'App\Policies\ReviewPolicy',
        // 'App\Tag' => 'App\Policies\TagPolicy',
        // 'App\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    }
}
