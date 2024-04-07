<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Gate::define('update-post', function(User $user, Post $post){
            return $user->level === "editor";
        });

        Gate::define('create-post', function(User $user){
            return $user->level === 'editor';
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('update-post', function(User $user){
            return $user->level === "editor" || $user->level === "admin";
        });

        Gate::define('create-post', function(User $user){
            return $user->level === 'editor';
        });
    }
}
