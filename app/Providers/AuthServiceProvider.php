<?php

namespace App\Providers;

use App\Image;
use App\Item;
use App\OngoingRent;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Collection;

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

        Gate::define('edit-item', function (User $user, $item) {
            return $user->id === $item->user_id;
        });

        Gate::define('update-item', function (User $user, $item) {
            return $user->id === $item->user_id;
        });

        Gate::define('delete-item', function (User $user, $item) {
            return $user->id === $item->user_id;
        });

        Gate::define('delete-images', function (User $user, Collection $images, Item $item){
            return collect($images)->every(function ($image) use ($item) {
                return $image->item_id === $item->id;
            });
        });

        Gate::define('rent-request', function (User $user, $notification) {
            return $user->id === $notification->notifiable_id;
        });

        Gate::define('delete-rent', function (User $user, OngoingRent $ongoingRent) {
            return $user->id === $ongoingRent->item->user_id;
        });
    }
}
