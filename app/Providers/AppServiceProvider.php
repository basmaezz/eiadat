<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Setting;
use App\Social;
use App\Pages;
use App\Cateory;
use App\News;
use App\City;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //DB
        Schema::defaultStringLength(191);

        //Site Data
        $setting = Setting::find(1);
        $social = Social::all();
        $headerPages = Pages::where('location' , '=' , 1)->get();
        $footerPage = Pages::where('location' , '=' , 2)->get();
        $footerCateory = Cateory::take(10)->get();
        $footerBlog = News::take(3)->orderBy('id' , 'DESC')->get();
        $allCityFooter = City::take(10)->get();
        //
        view()->share([
            'setting' => $setting,
            'social' => $social,
            'headerPages' => $headerPages,
            'footerPage' => $footerPage,
            'footerCateory' => $footerCateory,
            'footerBlog' => $footerBlog,
            'allCityFooter' => $allCityFooter,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


}
