<?php
use Illuminate\Support\Facades\Route;
use Tuanh\Asset\Controllers\BrandController;
use Tuanh\Asset\Controllers\ProductController;
use Tuanh\Asset\Controllers\Test\TestController;
use Tuanh\Asset\Controllers\TypeController;
use Tuanh\Asset\Controllers\VehicleController;

// Route::get('test-package-asset',"Tuanh\Asset\Controllers\Test\TestController@index")->name('test');

Route::middleware('web')->group(function(){
    Route::prefix('asset')->group(function(){
        Route::get('/',[TestController::class, 'index'])->name('info.home');
        Route::post('/submit',[TestController::class, 'main'])->name('info.submit');
        Route::get('/show',[TestController::class, 'show'])->name('info.show');

        //product
        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('product.list');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/', [ProductController::class, 'store'])->name('product.store');
            Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
            Route::post('/update', [ProductController::class, 'update'])->name('product.update');
            Route::post('/delete', [ProductController::class, 'delete'])->name('product.delete');
            Route::get('/trash', [ProductController::class, 'trash'])->name('product.trash');
            Route::post('/un-trash', [ProductController::class, 'unTrash'])->name('product.un-trash');
        });

        //product
        Route::prefix('brand')->group(function () {
            Route::get('/', [BrandController::class, 'index'])->name('brand.list');
            Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
            Route::post('/', [BrandController::class, 'store'])->name('brand.store');
            Route::get('/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
            Route::get('/{id}/get', [BrandController::class, 'get'])->name('brand.get');
            Route::post('/update', [BrandController::class, 'update'])->name('brand.update');
            Route::post('/delete', [BrandController::class, 'delete'])->name('brand.delete');
            Route::get('/trash', [BrandController::class, 'trash'])->name('brand.trash');
            Route::post('/un-trash', [BrandController::class, 'unTrash'])->name('brand.un-trash');
        });

        //vehicle
        Route::prefix('vehicle')->group(function () {
            Route::get('/', [VehicleController::class, 'index'])->name('vehicle.list');
            Route::get('/create', [VehicleController::class, 'create'])->name('vehicle.create');
            Route::post('/', [VehicleController::class, 'store'])->name('vehicle.store');
            Route::get('/{id}/edit', [VehicleController::class, 'edit'])->name('vehicle.edit');
            Route::get('/{id}/get', [VehicleController::class, 'get'])->name('vehicle.get');
            Route::post('/update', [VehicleController::class, 'update'])->name('vehicle.update');
            Route::post('/delete', [VehicleController::class, 'delete'])->name('vehicle.delete');
            Route::get('/trash', [VehicleController::class, 'trash'])->name('vehicle.trash');
            Route::post('/un-trash', [VehicleController::class, 'unTrash'])->name('vehicle.un-trash');
        });

        //type
        Route::prefix('type')->group(function () {
            Route::get('/', [TypeController::class, 'index'])->name('type.list');
            Route::get('/create', [TypeController::class, 'create'])->name('type.create');
            Route::post('/', [TypeController::class, 'store'])->name('type.store');
            Route::get('/{id}/edit', [TypeController::class, 'edit'])->name('type.edit');
            Route::get('/{id}/get', [TypeController::class, 'get'])->name('type.get');
            Route::post('/update', [TypeController::class, 'update'])->name('type.update');
            Route::post('/delete', [TypeController::class, 'delete'])->name('type.delete');
            Route::get('/trash', [TypeController::class, 'trash'])->name('type.trash');
            Route::post('/un-trash', [TypeController::class, 'unTrash'])->name('type.un-trash');
        });

    });
});
