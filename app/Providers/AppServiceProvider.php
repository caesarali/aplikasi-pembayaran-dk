<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Schema::defaultStringLength(191);

        $halaman = '';
        if (Request::segment(1) == 'admin') {
            $halaman = 'admin';
            if (Request::segment(2) == 'mahasiswa') {
                $halaman = 'mahasiswa';
            } elseif (Request::segment(2) == 'user') {
                $halaman = 'user';
            } elseif (Request::segment(2) == 'users') {
                if (Request::segment(3) == 'teller') {
                    $halaman = 'teller';
                } else {
                    $halaman = 'bendum';
                }
            }
        }

        if (Request::segment(1) == 'home') {
            $halaman = 'home';
        }

        if (Request::segment(1) == 'history') {
            $halaman = 'history';
        }

        if (Request::segment(1) == 'cek-pembayaran-dk') {
            $halaman = 'cek-pembayaran';
        }

        view()->share('halaman', $halaman);
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
