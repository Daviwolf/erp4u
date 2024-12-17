<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Actl\PostalCodeController;
use App\Http\Controllers\Actl\SupplierController;
use App\Http\Controllers\Actl\FamilyController;
use App\Http\Controllers\Actl\UnitMeasureController;
use App\Http\Controllers\Actl\TaxRateController;
use App\Http\Controllers\Actl\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});

// PostalCode Routes
Route::controller(PostalCodeController::class)->group(function () {
    Route::get('/postalCode/all', 'PostalCodeAll')->name('postalCode.all');
    Route::get('/postalCode/add', 'PostalCodeAdd')->name('postalCode.add');
    Route::post('/postalCode/store', 'PostalCodeStore')->name('postalCode.store');
    Route::get('/postalCode/edit/{id}', 'PostalCodeEdit')->name('postalCode.edit');
    Route::post('/postalCode/update', 'PostalCodeUpdate')->name('postalCode.update');
    Route::get('/postalCode/delete/{id}', 'PostalCodeDelete')->name('postalCode.delete');
});

// Supplier Routes
Route::controller(SupplierController::class)->group(function () {
    Route::get('/supplier/all', 'SupplierAll')->name('supplier.all');
    Route::get('/supplier/add', 'SupplierAdd')->name('supplier.add');
    Route::post('/supplier/store', 'SupplierStore')->name('supplier.store');
    Route::get('/supplier/edit/{id}', 'SupplierEdit')->name('supplier.edit');
    Route::post('/supplier/update', 'SupplierUpdate')->name('supplier.update');
    Route::get('/supplier/delete/{id}', 'SupplierDelete')->name('supplier.delete');
});

// Family Routes
Route::controller(FamilyController::class)->group(function () {
    Route::get('/family/all', 'FamilyAll')->name('family.all');
    Route::get('/family/add', 'FamilyAdd')->name('family.add');
    Route::post('/family/store', 'FamilyStore')->name('family.store');
    Route::get('/family/edit/{id}', 'FamilyEdit')->name('family.edit');
    Route::post('/family/update', 'FamilyUpdate')->name('family.update');
    Route::get('/family/delete/{id}', 'FamilyDelete')->name('family.delete');
});

// UnitMeasure Routes
Route::controller(UnitMeasureController::class)->group(function () {
    Route::get('/unit-measures/all', 'UnitMeasureAll')->name('unit_measures.all');
    Route::get('/unit-measures/add', 'UnitMeasureAdd')->name('unit_measures.add');
    Route::post('/unit-measures/store', 'UnitMeasureStore')->name('unit_measures.store');
    Route::get('/unit-measures/edit/{id}', 'UnitMeasureEdit')->name('unit_measures.edit');
    Route::post('/unit-measures/update/{id}', 'UnitMeasureUpdate')->name('unit_measures.update');
    Route::get('/unit-measures/delete/{id}', 'UnitMeasureDelete')->name('unit_measures.delete');
});

// TaxRate Routes
Route::controller(TaxRateController::class)->group(function () {
    Route::get('/tax-rates/all', 'TaxRateAll')->name('tax_rate.all');
    Route::get('/tax-rates/add', 'TaxRateAdd')->name('tax_rate.add');
    Route::post('/tax-rates/store', 'TaxRateStore')->name('tax_rate.store');
    Route::get('/tax-rates/edit/{id}', 'TaxRateEdit')->name('tax_rate.edit');
    Route::post('/tax-rates/update/{id}', 'TaxRateUpdate')->name('tax_rate.update');
    Route::get('/tax-rates/delete/{id}', 'TaxRateDelete')->name('tax_rate.delete');
});

// Product Routes
Route::prefix('product')->controller(ProductController::class)->group(function () {
    Route::get('/all', 'ProductAll')->name('product.all');
    Route::get('/add', 'ProductAdd')->name('product.add');
    Route::post('/store', 'ProductStore')->name('product.store');
    Route::get('/edit/{id}', 'ProductEdit')->name('product.edit');
    Route::post('/update/{id}', 'ProductUpdate')->name('product.update');
    Route::get('/delete/{id}', 'ProductDelete')->name('product.delete');
});

// Dashboard Route
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authentication Routes
require __DIR__.'/auth.php';
