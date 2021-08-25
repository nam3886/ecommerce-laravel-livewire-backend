<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\LoginComponent;
use App\Http\Livewire\Auth\NewPasswordComponent;
use App\Http\Livewire\Auth\PasswordResetLinkComponent;
use App\Http\Livewire\BannerComponent;
use App\Http\Livewire\BrandComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\DashboardComponent;
use App\Http\Livewire\OrderComponent;
use App\Http\Livewire\ProductComponent;
use App\Http\Livewire\SettingComponent;
use App\Http\Livewire\UserComponent;
use App\Http\Livewire\AttributeComponent;

Route::middleware('auth:admin')->group(function () {
    Route::get('/', DashboardComponent::class);
    Route::get('/dashboard', DashboardComponent::class)->name('admin.dashboard');
    Route::get('/brands', BrandComponent::class);
    Route::get('/categories', CategoryComponent::class);
    Route::get('/banners', BannerComponent::class);
    Route::get('/products', ProductComponent::class);
    Route::get('/users', UserComponent::class);
    Route::get('/orders', OrderComponent::class);
    Route::get('/attributes', AttributeComponent::class);
    Route::get('/setting/{type}', SettingComponent::class)->name('setting');
});

Route::middleware('guest:admin')->prefix('auth')->group(function () {
    Route::get('/login', LoginComponent::class)->name('admin.login');
    Route::get('/forgot-password', PasswordResetLinkComponent::class)->name('admin.password.email');
    Route::get('/reset-password/{token}', NewPasswordComponent::class)->name('admin.password.reset');
});
