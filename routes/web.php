<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Website\WebsiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Default Route
Auth::routes();

// Website Route List
Route::get('/', [WebsiteController::class, 'home'])->name('website.home');
Route::get('/about', [WebsiteController::class, 'about'])->name('website.about');
Route::get('/service', [WebsiteController::class, 'service'])->name('website.service');
Route::get('/contact-us', [WebsiteController::class, 'contactus'])->name('website.contactus');

// Admin Route List
Route::prefix('dashboard')->group(function () {
    // ROOT ROUTE
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // USER ROUTE LIST
    Route::resource('/user', UserController::class);
    Route::post('/users/{id}/password', [UserController::class, 'password_update'])->name('user.password.update');
    Route::post('/users/{id}/image', [UserController::class, 'image_update'])->name('user.image.update');
    Route::delete('/users/{id}/delete', [UserController::class, 'softdelete'])->name('user.soft.delete');

    // ROLE ROUTE LIST
    Route::resource('/role', RoleController::class);
    // BASIC ROUTE LIST
    Route::get('basic', [ManageController::class, 'basic'])->name('admin.manage.basic');
    Route::post('basic', [ManageController::class, 'basic_update'])->name('admin.manage.basic.update');

    // Contact Information Route List
    Route::get('contact-info', [ManageController::class, 'contactinfo'])->name('admin.manage.contactinfo');
    Route::post('contact-info', [ManageController::class, 'contactinfo_update'])->name('admin.manage.contactinfo.update');

    Route::get('socialmedia', [ManageController::class, 'socialmedia'])->name('admin.manage.socialmedia');
    Route::post('socialmedia', [ManageController::class, 'socialmedia_update'])->name('admin.manage.socialmedia.update');
});
