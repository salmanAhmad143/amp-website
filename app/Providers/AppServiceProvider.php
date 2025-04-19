<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Observers\SitemapObserver;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }



    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();
        Schema::defaultStringLength(191);
        // Update status of showcase based on expiry date.
        //DB::statement("CALL UpdateShowcaseStatus()");
        //Observer for site map
        $models = [
            \App\Models\Catalog::class,
            \App\Models\Showcase::class,
            \App\Models\Post::class,
            \App\Models\Category::class,
            \App\Models\Tag::class
        ];

        foreach ($models as $model) {
            $model::observe(SitemapObserver::class);
        }
    }
}
