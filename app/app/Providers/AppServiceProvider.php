<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Teacher;
use Illuminate\Support\Facades\Schema;

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
        // 'teachers'テーブルが存在する場合にのみ、このクエリを実行する
        if (Schema::hasTable('teachers')) {
            View::share('teachers', Teacher::all());
        }
    }
}
