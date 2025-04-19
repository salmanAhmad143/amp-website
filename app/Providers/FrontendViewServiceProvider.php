<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Setting;
use App\Models\CmsPage;
use App\Models\Post;
use App\Models\Tag;

class FrontendViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['frontend.layouts.master'], function ($view) {
            $setting = Setting::find(1);
            $view->with('settings', $setting);
        });

        View::composer(['frontend.layouts.header'], function ($view) {
            $menus = CmsPage::where('status', 1)->get();
            $view->with('menus', $menus);
        });

        // Share sidebar categories with specific views
        View::composer(['frontend.layouts.partials.categories'], function ($view) {
            $categories = Category::where('status', 1)->orderBy('name', 'asc')->get();
            $view->with('categories', $categories);
        });

        View::composer(['frontend.layouts.partials.tag'], function ($view) {
            $tags = Tag::where('status', 1)->orderBy('name', 'asc')->get();
            $view->with('tags', $tags);
        });

        // Share footer settings with all views
        View::composer(['frontend.layouts.partials.latestPost'], function ($view) {
            $posts = Post::where('status', 1)->latest()->get();
            $view->with('posts', $posts);
        });
    }
}
