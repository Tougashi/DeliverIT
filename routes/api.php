<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\CredibilityController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FirebaseController;


Route::post('login', [AuthController::class, 'Login']);
Route::post('user', [UserController::class, 'store']);

Route::middleware(['auth:sanctum', 'check.user.role'])->group(function () {

    Route::get('/logout', [AuthController::class, 'Logout']);
    Route::controller(UserController::class)->group(function(){
        Route::get('users', 'index');
        Route::get('users/{id}', 'show');
        Route::put('users/{id}', 'update');
        Route::delete('users/{id}', 'destroy');
    });
    Route::controller(RolesController::class)->group(function(){
        Route::get('roles', 'index');
        Route::post('role', 'store');
        Route::get('roles/{id}', 'show');
        Route::put('roles/{id}', 'update');
        Route::delete('roles/{id}', 'destroy');
    });
    Route::controller(StatusController::class)->group(function(){
        Route::get('statuses', 'index');
        Route::post('status', 'store');
        Route::get('status/{id}', 'show');
        Route::put('status/{id}', 'update');
        Route::delete('status/{id}', 'destroy');
    });
    Route::controller(CredibilityController::class)->group(function(){
        Route::get('credibilities', 'index');
        Route::post('credibility', 'store');
        Route::get('credibility/{id}', 'show');
        Route::put('credibility/{id}', 'update');
        Route::delete('credibility/{id}', 'destroy');
    });
    Route::controller(FinanceController::class)->group(function(){
        Route::get('finances', 'index');
        Route::post('finance', 'store');
        Route::get('finance/{id}', 'show');
        Route::put('finance/{id}', 'update');
        Route::delete('finance/{id}', 'destroy');
    });
    Route::controller(TransactionController::class)->group(function(){
        Route::get('transactions', 'index');
        Route::post('transaction', 'store');
        Route::get('transaction/{id}', 'show');
        Route::put('transaction/{id}', 'update');
        Route::delete('transaction/{id}', 'destroy');
    });
    Route::controller(ComplainController::class)->group(function(){
        Route::get('complains', 'index');
        Route::post('complain', 'store');
        Route::get('complain/{id}', 'show');
        Route::put('complain/{id}', 'update');
        Route::delete('complain/{id}', 'destroy');
    });
    Route::controller(ServiceController::class)->group(function(){
        Route::get('services', 'index');
        Route::post('service', 'store');
        Route::get('service/{id}', 'show');
        Route::put('service/{id}', 'update');
        Route::delete('service/{id}', 'destroy');
    });
    
    Route::controller(FirebaseController::class)->group(function(){
        Route::get('/get-users',  'users');
        Route::get('/get-drivers',  'drivers');
        Route::get('/available-drivers',  'availableDrivers');
        Route::get('/ride-requests',  'rideRequests');
    });
});


