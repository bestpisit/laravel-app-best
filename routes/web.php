<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerCRUDController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers', CustomerCRUDController::class);

Route::get('customer/{id}', [CustomerCRUDController::class,'fetchTaxByCustID'])->name('show.tax');

Route::get('tax/{id}', [CustomerCRUDController::class,'fetchCustByTax'])->name('show.tax');

Route::get('/post/{id}/comments', [PostController::class,'getCommentsByPost']);

Route::get('/add-users',[RoleController::class,'addUsers']);

Route::get('/rolesbyuser/{id}',[RoleController::class,'getAllRolesByUser']); 

Route::get('/usersbyrole/{id}',[RoleController::class,'getAllUsersByRole']);
