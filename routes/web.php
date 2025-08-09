<?php

use App\Livewire\Admin;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', Admin\Dashboard::class)->name('dashboard');
    Route::prefix('company')->name('companies.')->group(function () {
        Route::get('/', Admin\Companies\Index::class)->name('index');
        Route::get('/create', Admin\Companies\Create::class)->name('create');
        Route::get('/{id}/edit', Admin\Companies\Edite::class)->name('edit');
        });
            // For Departments
        Route::prefix('departement')->name('departements.')->group(function () {
            Route::get('/', Admin\Departement\Index::class)->name('index');
            Route::get('/create', Admin\Departement\Create::class)->name('create');
            Route::get('/{id}/edit', Admin\Departement\Edite::class)->name('edit');
        });

        // For Designations
        Route::prefix('designations')->name('designations.')->group(function () {
            Route::get('/', Admin\Designations\Index::class)->name('index');
            Route::get('/create', Admin\Designations\Create::class)->name('create');
            Route::get('/{id}/edit', Admin\Designations\Edite::class)->name('edit');
        });

        // For Employees
        Route::prefix('employees')->name('employees.')->group(function () {
            Route::get('/', Admin\Employees\Index::class)->name('index');
            Route::get('/create', Admin\Employees\Create::class)->name('create');
            Route::get('/{id}/edit', Admin\Employees\Edite::class)->name('edit');
        });

        // For Contracts
        Route::prefix('contracts')->name('contracts.')->group(function () {
            Route::get('/', Admin\Contracts\Index::class)->name('index');
            Route::get('/create', Admin\Contracts\Create::class)->name('create');
            Route::get('/{id}/edit', Admin\Contracts\Edite::class)->name('edit');
        });

        // For Payrolls
        Route::prefix('payrolls')->name('payrolls.')->group(function () {
            Route::get('/', Admin\Payrolls\Index::class)->name('index');
            Route::get('/{id}', Admin\Payrolls\Show::class)->name('show');
        });

        // For Payments
        Route::prefix('payments')->name('payments.')->group(function () {
            Route::get('/', Admin\Payments\Index::class)->name('index');
            Route::get('/{id}', Admin\Payments\Show::class)->name('show');
        });
})->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
