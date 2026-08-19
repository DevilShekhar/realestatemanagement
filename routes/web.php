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
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\frontend\SellerRegistrationController;
use App\Http\Controllers\frontend\BuyerRegistrationController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\LegalPagesController;
use App\Http\Controllers\admin\ContactsController;
use App\Http\Controllers\admin\PropertyEnquiryController;
use App\Http\Controllers\admin\ProfileController;


Route::get('/', [HomePageController::class, 'index'])->name('frontend.home');
Route::get('/about', [AboutController::class, 'index'])->name('frontend.about');
Route::post('/contact', [ContactController::class, 'store'])->name('frontend.contact.store');
Route::get('/contact', [ContactController::class, 'index'])->name('frontend.contact');
Route::prefix('seller')->name('seller.')->group(function () {
    Route::get('/register', [SellerRegistrationController::class, 'create'])->name('register');
    Route::post('/register', [SellerRegistrationController::class, 'store'])->name('register.store');
});

Route::prefix('buyer')->name('buyer.')->group(function () {
    Route::get('/register', [BuyerRegistrationController::class, 'create'])->name('register');
    Route::post('/register', [BuyerRegistrationController::class, 'store'])->name('register.store');
});
Route::name('frontend.')->group(function () {
    Route::get('/privacy-policy', [LegalPagesController::class, 'privacyPolicy'])->name('privacy');
    Route::get('/terms-and-conditions', [LegalPagesController::class, 'termsConditions'])->name('terms');
    Route::get('/disclaimer', [LegalPagesController::class, 'disclaimer'])->name('disclaimer');
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
    Route::put('properties/{property}/images', [PropertyController::class, 'updateImages'])->name('properties.images.update');
    Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index-list');
    Route::post('/properties/{property}/enquiry',[PropertyController::class, 'storeEnquiry'])->name('properties.enquiry.store');
    Route::get('/property-enquiries',[PropertyEnquiryController::class, 'index'])->name('property-enquiries.index');
    Route::get('/sold-out-property', [PropertyController::class, 'soldOutProperty'])->name('properties.sold-out-property');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
