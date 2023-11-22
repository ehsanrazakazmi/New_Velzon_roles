<?php

use App\Http\Controllers\UserManagement\ProductController;
use App\Http\Controllers\UserManagement\RoleController;
use App\Http\Controllers\UserManagement\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

Route::group(['middleware' => ['auth']], function() {

    // Role functionality
Route::controller(RoleController::class)->group(function(){
    Route::prefix('roles')->group(function () {
        Route::get('/list','index')->name('index.page');
        Route::get('/permissions/{id}','sh_pr')->name('role.pr');
        Route::post('/store','store')->name('role.store');
        Route::get('/edit/{id}', 'edit')->name('role.edit');
        Route::patch('/update/{id}','update')->name('role.update');
        Route::delete('/delete/{id}','destroy')->name('role.distroy');
    });
});


    // user functionality
Route::controller(UserController::class)->group(function(){
    Route::prefix('user')->group(function () {
        Route::get('/list','index')->name('user.index');
        Route::post('/store','store')->name('user.store');
        Route::get('/edit/{id}', 'edit')->name('user.edit');
        Route::patch('/update/{id}','update')->name('user.update');
        Route::delete('/delete/{id}','destroy')->name('user.destroy');
    });
});

Route::controller(ProductController::class)->group(function(){
    Route::prefix('product')->group(function () {
        Route::get('/list','index')->name('product.index');
        Route::post('/store','store')->name('product.store');
        Route::get('/edit/{id}', 'edit')->name('product.edit');
        Route::patch('/update/{id}','update')->name('product.update');
        Route::delete('/delete/{id}','destroy')->name('product.destroy');
    });
});


});


//Update User Details
// Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
// Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
