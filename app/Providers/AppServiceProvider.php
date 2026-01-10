<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

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
        // Share cart count with all views
        View::composer('*', function ($view) {
            $cartCount = 0;
            
            if (Auth::guard('web')->check()) {
                $cart = Cart::where('user_id', Auth::guard('web')->id())->first();
                $cartCount = $cart ? $cart->totalQuantity : 0;
            } else {
                $sessionId = session()->getId();
                $cart = Cart::where('session_id', $sessionId)->first();
                $cartCount = $cart ? $cart->totalQuantity : 0;
            }
            
            $view->with('cartCount', $cartCount);
        });
    }
}
