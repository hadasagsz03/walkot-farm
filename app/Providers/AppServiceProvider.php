<?php

namespace App\Providers;

use App\Models\TanamanDetail;
use App\Traits\ApiTrait;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    use ApiTrait;
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
        $footer['berita'] = $this->get_latest_berita('walkot farm');
        $footer['tanaman'] = TanamanDetail::inRandomOrder()->limit(8)->get();
        View::share('footer', $footer ?? null);
    }
}
