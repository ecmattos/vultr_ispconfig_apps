<?php

namespace SisCad\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\SisCad\Repositories\MeetingMemberRepository::class, \SisCad\Repositories\MeetingMemberRepositoryEloquent::class);
        $this->app->bind(\SisCad\Repositories\MeetingStatusRepository::class, \SisCad\Repositories\MeetingStatusRepositoryEloquent::class);
        //:end-bindings:
    }
}
