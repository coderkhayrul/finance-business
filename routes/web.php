<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactMesageController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Website\WebsiteController;
use App\Models\ContactMessage;
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
    Route::get('/basic', [ManageController::class, 'basic'])->name('admin.manage.basic');
    Route::post('/basic', [ManageController::class, 'basic_update'])->name('admin.manage.basic.update');

    // CONTACT INFORMATION ROUTE LIST
    Route::get('/contact-info', [ManageController::class, 'contactinfo'])->name('admin.manage.contactinfo');
    Route::post('/contact-info', [ManageController::class, 'contactinfo_update'])->name('admin.manage.contactinfo.update');

    // SOCIAL MEDIA ROUTE LIST
    Route::get('/socialmedia', [ManageController::class, 'socialmedia'])->name('admin.manage.socialmedia');
    Route::post('/socialmedia', [ManageController::class, 'socialmedia_update'])->name('admin.manage.socialmedia.update');

    // BANNER ROUTE LIST
    Route::get('/banner', [BannerController::class, 'index'])->name('banner.index');
    Route::get('/banner/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('/banner', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/banner/show/{slug}', [BannerController::class, 'show'])->name('banner.show');
    Route::get('/banner/edit/{slug}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::put('/banner/{slug}', [BannerController::class, 'update'])->name('banner.update');
    Route::delete('/banner/{slug}', [BannerController::class, 'destroy'])->name('banner.destroy');
    // Route::post('/banner/soft-delete/{slug}', [BannerController::class, 'delete'])->name('banner.delete');
    // Route::get('/banner/restore/{slug}', [BannerController::class, 'restore'])->name('banner.restore');

    // PARTNER ROUTE LIST
    Route::get('/partner', [PartnerController::class, 'index'])->name('partner.index');
    Route::get('/partner/create', [PartnerController::class, 'create'])->name('partner.create');
    Route::post('/partner', [PartnerController::class, 'store'])->name('partner.store');
    Route::get('/partner/show/{slug}', [PartnerController::class, 'show'])->name('partner.show');
    Route::get('/partner/edit/{slug}', [PartnerController::class, 'edit'])->name('partner.edit');
    Route::put('/partner/{slug}', [PartnerController::class, 'update'])->name('partner.update');
    Route::delete('/partner/{slug}', [PartnerController::class, 'destroy'])->name('partner.destroy');
    // Route::post('/partner/soft-delete/{slug}', [PartnerController::class, 'delete'])->name('partner.delete');
    // Route::get('/partner/restore/{slug}', [PartnerController::class, 'restore'])->name('partner.restore');

    // CONTACT MESSAGE ROUTE LIST
    Route::resource('/contact-message', ContactMesageController::class, ['only' => ['index', 'show', 'destroy']]);

    // GALLERY CATEGORY ROUTE LIST
    Route::resource('/gallery-category', GalleryCategoryController::class);

    // GALLERY ROUTE LIST
    Route::resource('/gallery', GalleryController::class);
});
