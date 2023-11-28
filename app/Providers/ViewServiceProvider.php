<?php
 
namespace App\Providers;
 
use App\View\Composers\NavComposer;
use App\View\Composers\SizeComposer;
use Illuminate\Support\Facades\View;
use App\View\Composers\ColorComposer;
use Illuminate\Support\ServiceProvider;
 
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ...
    }
 
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('user.nav', NavComposer::class);
        View::composer('user.CuaHang.CuaHang', SizeComposer::class);
        View::composer('user.CuaHang.CuaHang', ColorComposer::class);
    }
}