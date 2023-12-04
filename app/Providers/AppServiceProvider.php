<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('custom_password', function ($attribute, $value, $parameters, $validator) {
            // Memeriksa apakah password memenuhi semua persyaratan
            return preg_match('/^(?=.*[A-Z])(?=.*[0-9!@#$%^&*])[A-Za-z0-9!@#$%^&*]{8,255}$/', $value);
        });
    
        // Menambahkan pesan kesalahan kustom
        Validator::replacer('custom_password', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The :attribute must be at least 8 characters long, have an uppercase letter, and contain at least one number or symbol.');
        });
    }
}
