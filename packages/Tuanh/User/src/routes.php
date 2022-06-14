<?php

// Route::get('test-package-user',"Tuanh\User\Controllers\Test\TestController@index");\

use Illuminate\Support\Facades\Route;
use Tuanh\User\Controllers\AuthController;
use Tuanh\User\Controllers\MenuController;
use Tuanh\User\Controllers\User\PermissionController;
use Tuanh\User\Controllers\User\RoleController;
use Tuanh\User\Controllers\User\UserController;
Route::group(['middleware' => ['web']], function () {
    Route::get('/403', function () {
        return view('user::Errors.403');
    })->name('403');

    //authenticate
    Route::get('/', [AuthController::class, 'getFormLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'postFormLogin'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['auth', 'check.role']], function () {
        //trang chu
        Route::get('home', function () {
            return view('user::test.index');
        })->name('index');

        
        //menu
        Route::prefix('menus')->group(function () {
            Route::get('/', [MenuController::class, 'index'])->name('menu.list');
            Route::get('/create', [MenuController::class, 'create'])->name('menu.create');
            Route::post('/store', [MenuController::class, 'store'])->name('menu.store');
            Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
            Route::post('/update', [MenuController::class, 'update'])->name('menu.update');
            Route::post('/delete', [MenuController::class, 'delete'])->name('menu.delete');
        });
        
        //crud role
        Route::prefix(('roles'))->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('role.list');
            Route::get('/create', [RoleController::class, 'create'])->name('role.create');
            Route::post('/', [RoleController::class, 'store'])->name('role.store');
            Route::get('/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
            Route::post('/update', [RoleController::class, 'update'])->name('role.update');
            Route::post('/delete', [RoleController::class, 'delete'])->name('role.delete');
            Route::get('/trash', [RoleController::class, 'trash'])->name('role.trash');
            Route::post('/untrash', [RoleController::class, 'unTrash'])->name('role.untrash');
        });

        //crud user
        Route::prefix('users')->group(function(){
            Route::get('/', [UserController::class, 'index'])->name('user.list');
            Route::get('/create', [UserController::class, 'create'])->name('user.create');
            Route::post('/', [UserController::class, 'store'])->name('user.store');
            Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
            Route::post('/update', [UserController::class, 'update'])->name('user.update');
            Route::post('/delete', [UserController::class, 'delete'])->name('user.delete');
            Route::get('/trash', [UserController::class, 'trash'])->name('user.trash');
            Route::post('/untrash', [UserController::class, 'unTrash'])->name('user.untrash');
        });

        //permission
        Route::prefix('permissions')->group(function () {
            Route::get('/', [PermissionController::class, 'index'])->name('permission.list');
        });
    });
    
    
    
});