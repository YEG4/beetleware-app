<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
});

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::get('/logout', [SessionController::class, 'logout']);
Route::post('/login', [SessionController::class, 'store']);

// Route::middleware(['auth'])->group(function () {
//
//     Route::get('/users', [UserController::class, 'index'])->middleware('permission:view_users');
//     Route::post('/users', [UserController::class, 'store'])->middleware('permission:create_user');
//     Route::get('/users/create', [UserController::class, 'create'])->middleware('permission:create_user');
//     Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('permission:edit_users');
//     Route::patch('/users/{user}', [UserController::class, 'update'])->middleware('permission:edit_users');
//     Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('permission:delete_users');
// });

Route::resource('users', UserController::class)->except(['show']);

Route::middleware(['auth'])->group(function () {

    Route::get('roles', [RoleController::class, 'index'])->middleware('permission:view_roles');
    Route::post('/roles', [RoleController::class, 'store'])->middleware('permission:create_roles');
    Route::get('/roles/create', [RoleController::class, 'create'])->middleware('permission:create_roles');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->middleware('permission:edit_roles');
    Route::patch('/roles/{role}', [RoleController::class, 'update'])->middleware('permission:edit_roles');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->middleware('permission:delete_roles');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/permissions', [PermissionController::class, 'index'])->middleware('permission:view_permissions');
    Route::post('/permissions', [PermissionController::class, 'store'])->middleware('permission:create_permissions');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->middleware('permission:create_permissions');
    Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->middleware('permission:edit_permissions');
    Route::patch('/permissions/{permission}', [PermissionController::class, 'update'])->middleware('permission:edit_permissions');
    Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->middleware('permission:delete_permissions');

});
