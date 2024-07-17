<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        //
        // Gate is a permission or a simple role
        Gate::define('admin', function(User $user) : bool{
            return $user->is_admin;
        });
    
        Gate::define('idea.destroy', function(User $user, Idea $idea) : bool{
            return $user->is_admin || $user->id === $idea->user_id;
        });

        // Permission
        Gate::define('idea.edit', function(User $user, Idea $idea) : bool{
            return $user->is_admin || $user->id === $idea->user_id;
        });
    }
}
