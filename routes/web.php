<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CouriersController;
use App\Http\Controllers\CredibilityController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\ServiceController;



// MIDDLEWARE GUEST
Route::group(['middleware' => 'guest'], function () {
    Route::controller(AuthController::class)->group(function(){
        Route::get('/', 'SignIn')->name('login');
        Route::get('/login', 'SignIn')->name('login');
        Route::post('/signin', 'loginPost')->name('signin');
        Route::get('/signup', 'SignUp')->name('signup');
    });
});

Route::middleware(['auth', 'check.role:1'])->group(function () {
    Route::post('/signout', [AuthController::class, 'SignOut'])->name('logout');
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard', 'Dashboard')->name('Dashboard');
    });

    Route::controller(ComplainController::class)->group(function(){
        Route::get('/complain', 'Complain')->name('Complain');
        Route::get('/edit-complain', 'Edit')->name('Edit');
    });
    
    Route::controller(UserController::class)->group(function(){
        Route::get('/users', 'User')->name('User');
        Route::get('/edit-user', 'Edit')->name('Edit');
        Route::get('/delete-user/{userId}', 'delete')->name('delete.user');
        
        Route::get('/history-orders', 'History')->name('History');
        Route::get('/edit-order', 'Order')->name('Edit');
    });
    
    Route::controller(CouriersController::class)->group(function(){
        Route::get('/drivers', 'Couriers')->name('Couriers');
        Route::get('/courier-edit', 'Edit')->name('Edit');
        Route::get('/delete-drivers/{driversId}', 'delete')->name('delete.drivers');
        
        Route::get('/history-delivery', 'History')->name('History');
        Route::get('/edit-delivery', 'Delivery')->name('Edit');
    });
    
    Route::controller(TransactionController::class)->group(function(){
        Route::get('/transaction', 'Transaction')->name('Transaction');
    });
    
    Route::controller(FinancialController::class)->group(function(){
        Route::get('/user-balance', 'User')->name('Balance');
        Route::get('/courier-balance', 'Courier')->name('Balance');
    });
    
    Route::controller(CredibilityController::class)->group(function(){
        Route::get('/user-credibility', 'User')->name('Credibility');
        Route::get('/courier-credibility', 'Courier')->name('Credibility');
    });
    
    Route::controller(ServiceController::class)->group(function(){
        Route::get('/service', 'Service')->name('Service');
        Route::get('/add-service', 'Create')->name('Service Add');
        Route::get('/edit-service', 'Edit')->name('Service Edit');
    });
}); 