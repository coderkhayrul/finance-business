<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactMesageController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Website\WebsiteController;
use App\Models\ContactMessage;
use App\Models\GalleryCategory;
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
// Default Authentication Route
Auth::routes();

// Website Route List
Route::get('/', [WebsiteController::class, 'home'])->name('website.home');
Route::get('/about', [WebsiteController::class, 'about'])->name('website.about');
Route::get('/service', [WebsiteController::class, 'service'])->name('website.service');
Route::get('/contact-us', [WebsiteController::class, 'contactus'])->name('website.contactus');

// Admin Route List
Route::prefix('dashboard')->group(function () {

    // ROOT ROUTE DASHBOARD
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // USER ROUTE LIST
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/show/{slug}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/edit/{slug}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{slug}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{slug}', [UserController::class, 'destroy'])->name('user.destroy');
    // ============ EXTRA ==============
    Route::post('/users/{id}/password', [UserController::class, 'password_update'])->name('user.password.update');
    Route::post('/users/{id}/image', [UserController::class, 'image_update'])->name('user.image.update');
    Route::delete('/users/{id}/delete', [UserController::class, 'softdelete'])->name('user.soft.delete');

    // ROLE ROUTE LIST
    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/show/{slug}', [RoleController::class, 'show'])->name('role.show');
    Route::get('/role/edit/{slug}', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/role/{slug}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('/role/{slug}', [RoleController::class, 'destory'])->name('role.destory');

    // BASIC ROUTE LIST
    Route::get('/basic', [ManageController::class, 'basic'])->name('admin.manage.basic');
    Route::post('/basic', [ManageController::class, 'basic_update'])->name('admin.manage.basic.update');

    // CONTACT INFORMATION ROUTE LIST
    Route::get('/contact/info', [ManageController::class, 'contactinfo'])->name('admin.manage.contactinfo');
    Route::post('/contact/info', [ManageController::class, 'contactinfo_update'])->name('admin.manage.contactinfo.update');

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

    // PARTNER ROUTE LIST
    Route::get('/partner', [PartnerController::class, 'index'])->name('partner.index');
    Route::get('/partner/create', [PartnerController::class, 'create'])->name('partner.create');
    Route::post('/partner', [PartnerController::class, 'store'])->name('partner.store');
    Route::get('/partner/show/{slug}', [PartnerController::class, 'show'])->name('partner.show');
    Route::get('/partner/edit/{slug}', [PartnerController::class, 'edit'])->name('partner.edit');
    Route::put('/partner/{slug}', [PartnerController::class, 'update'])->name('partner.update');
    Route::delete('/partner/{slug}', [PartnerController::class, 'destroy'])->name('partner.destroy');

    // CONTACT MESSAGE ROUTE LIST
    Route::get('/contact/message', [ContactMesageController::class, 'index'])->name('contact-message.index');
    Route::get('/contact/message/show/{slug}', [ContactMesageController::class, 'show'])->name('contact-message.show');
    Route::delete('/contact/message/{slug}', [ContactMesageController::class, 'destroy'])->name('contact-message.destroy');

    // GALLERY CATEGORY ROUTE LIST
    Route::get('/gallery/category', [GalleryCategoryController::class, 'index'])->name('gallery-category.index');
    Route::get('/gallery/category/create', [GalleryCategoryController::class, 'create'])->name('gallery-category.create');
    Route::post('/gallery/category', [GalleryCategoryController::class, 'store'])->name('gallery-category.store');
    Route::get('/gallery/category/show/{slug}', [GalleryCategoryController::class, 'show'])->name('gallery-category.show');
    Route::get('/gallery/category/edit/{slug}', [GalleryCategoryController::class, 'edit'])->name('gallery-category.edit');
    Route::put('/gallery/category/{slug}', [GalleryCategoryController::class, 'update'])->name('gallery-category.update');
    Route::delete('/gallery/category/{slug}', [GalleryCategoryController::class, 'destroy'])->name('gallery-category.destroy');

    // GALLERY ROUTE LIST
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/show/{slug}', [GalleryController::class, 'show'])->name('gallery.show');
    Route::get('/gallery/edit/{slug}', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/{slug}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{slug}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // TESTIMONIAL ROUTE LIST
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('/testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/testimonial/show/{slug}', [TestimonialController::class, 'show'])->name('testimonial.show');
    Route::get('/testimonial/edit/{slug}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::put('/testimonial/{slug}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::delete('/testimonial/{slug}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');

    // SERVICE ROUTE LIST
    Route::get('/services', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/show/{slug}', [ServiceController::class, 'show'])->name('service.show');
    Route::get('/service/edit/{slug}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/service/{slug}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/{slug}', [ServiceController::class, 'destroy'])->name('service.destroy');

    // TEAM MEMBER ROUTE LIST
    Route::get('/team/member', [TeamMemberController::class, 'index'])->name('team-member.index');
    Route::get('/team/member/create', [TeamMemberController::class, 'create'])->name('team-member.create');
    Route::post('/team/member', [TeamMemberController::class, 'store'])->name('team-member.store');
    Route::get('/team/member/show/{slug}', [TeamMemberController::class, 'show'])->name('team-member.show');
    Route::get('/team/member/edit/{slug}', [TeamMemberController::class, 'edit'])->name('team-member.edit');
    Route::put('/team/member/{slug}', [TeamMemberController::class, 'update'])->name('team-member.update');
    Route::delete('/team/member/{slug}', [TeamMemberController::class, 'destroy'])->name('team-member.destroy');

    // CLIENT ROUTE LIST
    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
    Route::post('/client', [ClientController::class, 'store'])->name('client.store');
    Route::get('/client/show/{slug}', [ClientController::class, 'show'])->name('client.show');
    Route::get('/client/edit/{slug}', [ClientController::class, 'edit'])->name('client.edit');
    Route::put('/client/{slug}', [ClientController::class, 'update'])->name('client.update');
    Route::delete('/client/{slug}', [ClientController::class, 'destroy'])->name('client.destroy');

    // PROJECT CATEGORY ROUTE LIST
    Route::get('/project/category', [ProjectCategoryController::class, 'index'])->name('project-category.index');
    Route::get('/project/category/create', [ProjectCategoryController::class, 'create'])->name('project-category.create');
    Route::post('/project/category', [ProjectCategoryController::class, 'store'])->name('project-category.store');
    Route::get('/project/category/show/{slug}', [ProjectCategoryController::class, 'show'])->name('project-category.show');
    Route::get('/project/category/edit/{slug}', [ProjectCategoryController::class, 'edit'])->name('project-category.edit');
    Route::put('/project/category/{slug}', [ProjectCategoryController::class, 'update'])->name('project-category.update');
    Route::delete('/project/category/{slug}', [ProjectCategoryController::class, 'destroy'])->name('project-category.destroy');

    // PROJECT ROUTE LIST
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/show/{slug}', [ProjectController::class, 'show'])->name('project.show');
    Route::get('/project/edit/{slug}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/project/{slug}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/{slug}', [ProjectController::class, 'destroy'])->name('project.destroy');

    // NEWSLETTER ROUTE LIST
    Route::get('/newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
    Route::delete('/newsletter/{slug}', [NewsletterController::class, 'destroy'])->name('newsletter.destroy');

    // PAGES ROUTE LIST
    Route::get('/page', [PageController::class, 'index'])->name('page.index');
    Route::get('/page/create', [PageController::class, 'create'])->name('page.create');
    Route::post('/page', [PageController::class, 'store'])->name('page.store');
    Route::get('/page/show/{slug}', [PageController::class, 'show'])->name('page.show');
    Route::get('/page/edit/{slug}', [PageController::class, 'edit'])->name('page.edit');
    Route::put('/page/{slug}', [PageController::class, 'update'])->name('page.update');
    Route::delete('/page/{slug}', [PageController::class, 'destroy'])->name('page.destroy');
});
