<?php

use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\admin\SettingsController;
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
        Route::get('settings',[SettingsController::class, 'showSettings'])->name('settings');

        Route::get('logout',[LoginController::class, 'logout'])->name('admin.logout');
    });
});

// User Route
Route::controller(SettingsController::class)->group(function(){
    Route::get('admin/user/edit/{user}','editUser')->name('admin.editUser');
    Route::put('admin/user/update/{user}','updateUser')->name('admin.updateUser');
    Route::delete('admin/user/detete/{user}','destroyUser')->name('admin.destroyUser');
});

// Rooms Route
Route::controller(RoomController::class)->group(function(){
    Route::post('admin/rooms','addRoom')->name('admin.addRooms');
    Route::get('admin/rooms/edit/{room_id}','editRoom')->name('admin.editRoom');
    Route::put('admin/rooms/update/','updateRoom')->name('admin.updateRoom');
    Route::get('admin/rooms/preview/{room_id}','prevOneRoom')->name('admin.prevOneRoom');
    Route::get('admin/rooms/delete/{room_id}','destroyRoom')->name('admin.destroyRoom');
});

// Staff Routes
Route::controller(StaffController::class)->group(function(){
    Route::post('admin/staff','addStaff')->name('admin.addStaff');
    Route::get('admin/staff/edit/{staff_id}','editStaff')->name('admin.editStaff');
    Route::get('admin/staff/preview/{staff_id}','prevOneStaff')->name('admin.prevOneStaff');
    Route::put('admin/staff/update/','updateStaff')->name('admin.updateStaff');
    Route::delete('admin/staff/{staff}','destroyStaff')->name('admin.destroyStaff');
});


