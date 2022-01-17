<?php

use App\Http\Controllers\admin\adminCate;
use App\Http\Controllers\admin\adminProduct;
use App\Http\Controllers\client\Contact;
use App\Http\Controllers\client\Home;
use App\Http\Controllers\client\Introduce;
use Illuminate\Support\Facades\Route;

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

// =======================PHÍA ADMIN==================


// Trang quản trị danh mục
Route::group(['prefix' => 'quan-tri'], function () {
    Route::group(['prefix' => '/danh-muc'], function () {
        Route::get('/', [adminCate::class, 'index'])->name('danh-muc.index');
        Route::post('/them', [adminCate::class, 'store'])->name('danh-muc.store');
        Route::get('/xoa/{id}', [adminCate::class, 'destroy'])->name('danh-muc.destroy');
    });
    // Sản phẩm
    Route::group(['prefix' => '/san-pham'], function () {
        Route::get('/',  [adminProduct::class, 'index'])->name('san-pham.index');
    });
});



// ==========================PHÍA CLIENT===================
Route::group(
    ['prefix' => '/'],
    function () {
        Route::group(['prefix' => '/'], function () {
            Route::get('/', [Home::class, 'index'])->name('home');
            Route::get('/gioi-thieu', [Introduce::class, 'index'])->name('intro');
            Route::get('/lien-he', [Contact::class, 'index'])->name('contact');
        });
    }
);
