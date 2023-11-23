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
        Route::get('/list','index')->name('index.page')->middleware('can:Role list');
        Route::get('/permissions/{id}','sh_pr')->name('role.pr')->middleware('can:Role list');
        Route::post('/store','store')->name('role.store')->middleware('can:Role create');
        Route::get('/edit/{id}', 'edit')->name('role.edit')->middleware('can:Role edit');
        Route::patch('/update/{id}','update')->name('role.update')->middleware('can:Role edit');
        Route::delete('/delete/{id}','destroy')->name('role.distroy')->middleware('can:Role delete');
    });
});

    // user functionality
Route::controller(UserController::class)->group(function(){
    Route::prefix('user')->group(function () {
        Route::get('/list','index')->name('user.index')->middleware('can:User list');
        Route::post('/store','store')->name('user.store')->middleware('can:User create');
        Route::get('/edit/{id}', 'edit')->name('user.edit')->middleware('can:User edit');
        Route::patch('/update/{id}','update')->name('user.update')->middleware('can:User edit');
        Route::delete('/delete/{id}','destroy')->name('user.destroy')->middleware('can:User delete');
    });
});

// product functionality
Route::controller(ProductController::class)->group(function(){
    Route::prefix('product')->group(function () {
        Route::get('/list','index')->name('product.index')->middleware('can:Product list');
        Route::post('/store','store')->name('product.store')->middleware('can:Product create');
        Route::get('/edit/{id}', 'edit')->name('product.edit')->middleware('can:Product edit');
        Route::patch('/update/{id}','update')->name('product.update')->middleware('can:Product edit');
        Route::delete('/delete/{id}','destroy')->name('product.destroy')->middleware('can:Product delete');
    });
});


});


//Update User Details
// Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
// Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
