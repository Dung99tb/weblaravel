<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // php artisan make:policy CategoryPolicy --model=Category
        $this->registerPolicies();
        // $this->defineGateCategory();
        // Gate::define('menu-list', function ($user) {
        //     return $user->checkPermissionAccess(config('permissions.access.list-menu'));
        // });
    }

    // public function defineGateCategory()
    // {
    //     Gate::define('category-list','App\Policies\CategoryPolicy@view');
    // }
}
