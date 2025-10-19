<?php

use App\Livewire\Admin;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', Admin\Dashboard::class)->name('dashboard');

    Route::prefix('companies')->name('companies.')->group(function () {
        Route::get('/', Admin\Companies\Index::class)->name('index');
        Route::get('create', Admin\Companies\Create::class)->name('create');
        Route::get('{id}/edit', Admin\Companies\Edit::class)->name('edit');
    });

    Route::middleware('company.context')->group(function () {
        Route::prefix('departments')->name('departments.')->group(function () {
        Route::get('/', Admin\Departments\Index::class)->name('index');
        Route::get('create', Admin\Departments\Create::class)->name('create');
        Route::get('{id}/edit', Admin\Departments\Edit::class)->name('edit');
    });

    Route::prefix('designations')->name('designations.')->group(function () {
        Route::get('/', Admin\Designations\Index::class)->name('index');
        Route::get('create', Admin\Designations\Create::class)->name('create');
        Route::get('{id}/edit', Admin\Designations\Edit::class)->name('edit');
    });

    Route::prefix('employees')->name('employees.')->group(function () {
        Route::get('/', Admin\Employees\Index::class)->name('index');
        Route::get('create', Admin\Employees\Create::class)->name('create');
        Route::get('{id}/edit', Admin\Employees\Edit::class)->name('edit');
    });

    Route::prefix('contracts')->name('contracts.')->group(function () {
        Route::get('/', Admin\Contracts\Index::class)->name('index');
        Route::get('create', Admin\Contracts\Create::class)->name('create');
        Route::get('{id}/edit', Admin\Contracts\Edit::class)->name('edit');
    });

    Route::prefix('payrolls')->name('payrolls.')->group(function () {
        Route::get('/', Admin\Payrolls\Index::class)->name('index');
        Route::get('{id}/show', Admin\Payrolls\Show::class)->name('show');
    });

    Route::prefix('payments')->name('payments.')->group(function () {
        Route::get('/', Admin\Payments\Index::class)->name('index');
        Route::get('{id}/show', Admin\Payments\Show::class)->name('show');
        
    });
    });
});


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';