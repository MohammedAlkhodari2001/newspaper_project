<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Middleware\AdminMiddleware;
use App\Livewire\HomeComponent;
use App\Livewire\CategoryComponent;
use App\Livewire\PostsByCategoryComponent;
use App\Livewire\ContactComponent;
use App\Livewire\SingleComponent;
use App\Livewire\SearchBarComponent;
use App\Livewire\Admin\AdminCategoryComponent;  
use App\Livewire\Admin\AdminAddCategoryComponent;
use App\Livewire\Admin\AdminEditCategoryComponent;
use App\Livewire\Admin\AdminTagComponent;
use App\Livewire\Admin\AdminAddTagComponent;
use App\Livewire\Admin\AdminEditTagComponent;
use App\Livewire\Admin\AdminPostsComponent;
use App\Livewire\Admin\AdminAddPostComponent;
use App\Http\Middleware\SupportMiddleware;
use App\Livewire\Support\SupportComponent;
use App\Livewire\Support\SupportUsersComponent;
use App\Livewire\Support\SupportAddAdvertisementComponent;
use App\Livewire\Support\SupportManageAdvertisementsComponent;
use App\Livewire\Support\SupportSubscriptionsComponent;
use App\Livewire\Support\SupportManageCommentsComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use Livewire\Volt\Volt;

// Public Routes
Route::get('/', HomeComponent::class)->name('index');
Route::get('/search', SearchBarComponent::class)->name('search');
Route::get('/category', CategoryComponent::class)->name('category');
Route::get('/category/{id}', PostsByCategoryComponent::class)->name('category.posts');
Route::get('/contact', ContactComponent::class)->name('contact');
Route::get('/single', SingleComponent::class)->name('single');
Route::get('/post/{id}', SingleComponent::class)->name('post.single');
Route::get('/post-image/{id}', SingleComponent::class . '@getImage')->name('post.image');

// Guest Routes (Authentication Pages)
Route::middleware('guest')->group(function () {
    Volt::route('register', 'pages.auth.register')->name('register');
    Volt::route('login', 'pages.auth.login')->name('login');
    Volt::route('forgot-password', 'pages.auth.forgot-password')->name('password.request');
    Volt::route('reset-password/{token}', 'pages.auth.reset-password')->name('password.reset');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Verify Email Routes
    Volt::route('verify-email', 'pages.auth.verify-email')->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    // Confirm Password
    Volt::route('confirm-password', 'pages.auth.confirm-password')->name('password.confirm');

    // Role-based Redirection After Login
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // Redirects to either admin or user page

    // Admin Routes (Only Accessible by Admins)
    Route::middleware(['auth', AdminMiddleware::class])->group(function () {
        Route::get('/admin', AdminPostsComponent::class)->name('admin.posts');  // Admin posts
        Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories'); 
        Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.category.add'); 
        Route::get('/admin/category/edit/{category_id}', AdminEditCategoryComponent::class)->name('admin.category.edit'); 
        Route::get('/admin/tags', AdminTagComponent::class)->name('admin.tags'); 
        Route::get('/admin/tag/add', AdminAddTagComponent::class)->name('admin.tag.add'); 
        Route::get('/admin/tag/edit/{tag_id}', AdminEditTagComponent::class)->name('admin.tags.edit'); 
        Route::get('/admin/posts', AdminPostsComponent::class)->name('admin.posts'); 
        Route::get('/admin/post/add', AdminAddPostComponent::class)->name('admin.post.add'); 
    });

    // User Home Page for Authenticated Users
    Route::get('/user-dashboard', function () {
        return redirect()->route('index');  // Redirect to homepage
    })->name('user.home');
    Route::middleware(['auth', SupportMiddleware::class])->group(function () {
        Route::get('/support', SupportUsersComponent::class)->name('support');  // Main Support Dashboard
        Route::get('/support/users', SupportUsersComponent::class)->name('support.users');  // User management
        Route::get('/support/advertisements/add', SupportAddAdvertisementComponent::class)->name('support.advertisements.add');  // Add advertisement
        Route::get('/support/advertisements/manage', SupportManageAdvertisementsComponent::class)->name('support.advertisements.manage');  // Manage advertisements
        Route::get('/support/subscriptions', SupportSubscriptionsComponent::class)->name('support.subscriptions');  // Manage subscriptions
        Route::get('/support/comments', SupportManageCommentsComponent::class)->name('support.comments');
    });
});
