<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\PropertyCategoryController;
use App\Http\Controllers\admin\AmenityController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\StateController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\AreaController;
use App\Http\Controllers\admin\PropertyController;
use App\Http\Controllers\admin\PropertySearchController;
use App\Http\Controllers\frontend\HomePageController;
use App\Http\Controllers\Frontend\SellerRegistrationController;


Route::get('/', [HomePageController::class, 'index'])->name('frontend.home');
Route::prefix('seller')->name('seller.')->group(function () {
    Route::get('/register', [SellerRegistrationController::class, 'create'])->name('register');
    Route::post('/register', [SellerRegistrationController::class, 'store'])->name('register.store');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('roles',RoleController::class);
    Route::get('roles/{role}/permissions', [RoleController::class, 'permissions'])->name('roles.permissions');
    Route::put('roles/{role}/permissions', [RoleController::class, 'updatePermissions'])->name('roles.permissions.update');
    Route::resource('permissions',PermissionController::class);
    Route::resource('users',UserController::class);
    Route::resource('property-categories', PropertyCategoryController::class);
    Route::resource('amenities', AmenityController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('states', StateController::class);
    Route::resource('cities', CityController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('properties', PropertyController::class);
    Route::put('properties/{property}/amenities',[PropertyController::class, 'updateAmenities'])->name('properties.amenities.update');
    Route::post('properties/{property}/images',[PropertyController::class, 'storeImages'])->name('properties.images.store');
    Route::put('properties/{property}/approve',[PropertyController::class, 'approve'])->name('properties.approve');
    Route::get('/get-properties',[PropertySearchController::class, 'index'])->name('properties.search');
});
