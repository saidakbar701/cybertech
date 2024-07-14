<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Category;

use App\Models\CategoryPost;

use App\Models\Ads;

use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        view()->composer('pagemaster',function($view){
            $categories = Category::all();
            $view->with(compact('categories')); 
        });

        view()->composer('category',function($view){
            $categories = Category::all();
            $view->with(compact('categories')); 
        });

        view()->composer('home',function($view){
            $ad = Ads::first();
            $categories = Category::all();
            $category = Category::all();
            $ads_posts = CategoryPost::where('ads',1)->limit(6)->latest()->get();
            $ads_postsTwo = CategoryPost::where('ads',0)->limit(6)->latest()->paginate(6);
            $latestPosts = CategoryPost::take(7)->get();
            $latestPostsTwo = CategoryPost::limit(8)->latest()->get();
            $popularPosts = CategoryPost::orderBy('view','DESC')->limit(8)->latest()->get();
            $view->with(compact('ads_posts','latestPosts','popularPosts','latestPostsTwo','categories','ads_postsTwo','category','ad')); 
        });

        view()->composer('category',function($view){
            $categories = Category::all();
            $ads_posts = CategoryPost::where('ads',1)->limit(6)->latest()->get();
            $ads_postsTwo = CategoryPost::where('ads',0)->limit(6)->first()->paginate(6);
            $latestPosts = CategoryPost::limit(7)->latest()->get();
            $latestPostsTwo = CategoryPost::limit(8)->latest()->get();
            $popularPosts = CategoryPost::orderBy('view','DESC')->limit(6)->latest()->get();
            $view->with(compact('ads_posts','latestPosts','popularPosts','latestPostsTwo','categories','ads_postsTwo')); 
        });

        view()->composer('postDetail',function($view){
            $categories = Category::all();
            $ads_postsTwo = CategoryPost::where('ads',0)->limit(6)->first()->paginate(6);
            $latestPosts = CategoryPost::limit(5)->latest()->get();
            $latestPostsTwo = CategoryPost::limit(5)->latest()->get();
            $popularPosts = CategoryPost::orderBy('view','DESC')->limit(4)->latest()->get();
            $view->with(compact('latestPosts','popularPosts','latestPostsTwo','categories','ads_postsTwo')); 
        });

        view()->composer('pagemaster',function($view){
            $latestPosts = CategoryPost::limit(3)->latest()->get();
            $categories = Category::limit(10)->get();
            $popularPosts = CategoryPost::orderBy('view','DESC')->limit(3)->latest()->get();
            $view->with(compact('popularPosts','categories','latestPosts')); 
        });

        view()->composer('search',function($view){
            $categories = Category::all();
            $category = Category::all();
            $ads_postsTwo = CategoryPost::where('ads',0)->limit(3)->latest()->paginate(3);
            $latestPosts = CategoryPost::take(4)->get();
            $latestPostsTwo = CategoryPost::limit(4)->latest()->get();
            $popularPosts = CategoryPost::orderBy('view','DESC')->limit(4)->latest()->get();
            $view->with(compact('latestPosts','popularPosts','latestPostsTwo','categories','ads_postsTwo','category')); 
        });
    }
}
