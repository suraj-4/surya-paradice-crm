<?php

use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// })->name('home');


//Guest Middleware
Route::group(['middleware' => 'guest'], function () {
    Route::get('register',[AuthenticationController::class, 'showRegisterForm'])->name('show.register.form');
    Route::post('register',[AuthenticationController::class, 'register'])->name('register');
    
    Route::get('login',[AuthenticationController::class, 'showLoginForm'])->name('show.login.form');
    Route::post('login',[AuthenticationController::class, 'login'])->name('login');
});

//Authenticated Middleware
Route::group(['middleware' => 'auth'], function () {
    Route::get('logout',[AuthenticationController::class, 'logout'])->name('logout');
    Route::get('/', function () { return view('home');  })->name('home');
});

// Authentication for Dashboard
Route::group(['prefix' => 'admin'],function(){

    // Guest Middleware for admin
    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('login',[LoginController::class, 'showAdminLoginForm'])->name('show.admin.login.form');
        Route::post('login',[LoginController::class, 'adminLogin'])->name('admin.login');
    });

    // Authenticated Middleware for admin
    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('dashboard',[DashboardController::class, 'showDashboard'])->name('dashboard');
        Route::get('rooms',[RoomController::class, 'showAllRooms'])->name('rooms');
        Route::get('booking',[DashboardController::class, 'showBooking'])->name('booking');
        Route::get('staff',[StaffController::class, 'ahowAllStaff'])->name('staff');
        Route::get('reports',[DashboardController::class, 'showReports'])->name('reports');

        Route::get('logout',[LoginController::class, 'logout'])->name('admin.logout');
    });
});

Route::controller(RoomController::class)->group(function(){
    Route::post('admin/rooms','addRoom')->name('admin.rooms');
});

Route::controller(StaffController::class)->group(function(){
    Route::post('admin/staff','addStaff')->name('admin.addStaff');
    Route::get('admin/staff/{staff}/edit','edit')->name('admin.editStaff');
    Route::put('admin/staff/{staff}','updateStaff')->name('admin.updateStaff');
});


