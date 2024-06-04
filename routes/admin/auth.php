<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\WebSocialLinkController;


Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    //Payment request routes

    Route::get('payment-request',[PaymentController::class,'payment_index'])->name('payment.index');
    Route::get('payment-approve/{id}',[PaymentController::class,'payment_approve'])->name('payment.approve');

    Route::get('withdraw-request',[PaymentController::class,'withdraw_index'])->name('withdraw.index');
    Route::get('withdraw-approve/{id}',[PaymentController::class,'withdraw_approve'])->name('withdraw.approve');


    Route::get('website-social-links',[WebSocialLinkController::class,'index'])->name('website.social.links');
    Route::post('website-social-links/update/{id}',[WebSocialLinkController::class,'update'])->name('update.social.links');


    // admin user management
    Route::post('user-management',[WebSocialLinkController::class,'userManagement'])->name('user.management');




    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
