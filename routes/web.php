<?php

use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CarerController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\FamilyController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ChangePasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Audit Logs
    Route::resource('audit-logs', AuditLogController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit']]);

    // Child
    Route::resource('children', ChildController::class, ['except' => ['store', 'update', 'destroy']]);

    // Carer
    Route::resource('carers', CarerController::class, ['except' => ['store', 'update', 'destroy']]);

    // Session
    Route::resource('sessions', SessionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Register
    Route::get('registers/today', [RegisterController::class, 'todaysRegister'])->name('register.today');
    Route::get('registers/{register}/report', [RegisterController::class, 'report'])->name('register.report');
    //Route::get('registers/{year}/{month}/{day}', [RegisterController::class, 'todaysRegister'])->name('register.today');
    Route::resource('registers', RegisterController::class, ['except' => ['update', 'destroy']]);

    // Booking
    Route::get('child/{child}/booking/create', [BookingController::class, 'create'])->name('child.bookings.create');
    Route::get('child/{child}/booking/{booking}/edit', [BookingController::class, 'edit'])->name('child.bookings.edit');
    Route::resource('bookings', BookingController::class, ['except' => ['create','edit','store', 'update', 'destroy']]);

    // Family
    Route::get('family/{family}/child/create', [FamilyController::class, 'createChildForFamily'])->name('families.child.create');
    Route::get('family/{family}/carer/create', [FamilyController::class, 'createCarerForFamily'])->name('families.carer.create');
    Route::resource('families', FamilyController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix'=> 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function (){
    Route::get('/password', [ChangePasswordController::class, 'edit'])->name('password.edit');
    Route::post('/password', [ChangePasswordController::class, 'update'])->name('password.update');
});
