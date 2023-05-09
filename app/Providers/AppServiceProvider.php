<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\LoaiSP;
use App\Models\User;
use App\Models\ProductModels;
use Illuminate\Support\Facades\DB;

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
        view()->composer('*', function ($view) {
            $view->with([
                'category' => LoaiSP::where('TrangThai', '1')->orderBy('TenLoaiSP', 'ASC')->get(),
                'cate' => LoaiSP::all(),
                'powers' => User::select('power')->whereNotNull('power')->distinct()->get()
            ]);
        });
    }
}
