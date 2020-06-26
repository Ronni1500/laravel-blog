<?php

namespace App\Providers;


use App\Http\ViewComposers\ArchivePosts;
use App\Http\ViewComposers\MenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('layouts.particles.header',MenuComposer::class);
        View::composer('layouts.particles.aside',ArchivePosts::class);
    }
    public function register()
    {
        //
    }
}
