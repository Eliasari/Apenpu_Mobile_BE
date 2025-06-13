<?php

namespace App\Providers;

use App\Models\Transaction;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('templates.admin', function ($view) {
            $pendingTransactionsCount = Transaction::where('status', 0)->count();
            $view->with('pendingTransactionsCount', $pendingTransactionsCount);
        });
    }
}
