<?php

use App\Livewire\Product\ProductCreate;
use App\Livewire\Product\ProductEdit;
use App\Livewire\Product\ProductIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/products', ProductIndex::class)->name('product.index');
Route::get('/products/create', ProductCreate::class)->name('product.create');
Route::get('/products/edit/{id}', ProductEdit::class)->name('product.edit');

require __DIR__ . '/auth.php';
