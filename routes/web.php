<?php

use App\Http\Controllers\admin\adminCate;
use App\Http\Controllers\admin\adminMain;
use App\Http\Controllers\admin\adminProduct;
use App\Http\Controllers\client\Contact;
use App\Http\Controllers\client\Form;
use App\Http\Controllers\client\Home;
use App\Http\Controllers\client\Introduce;
use App\Http\Controllers\client\Product;
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
        Route::get('/trang-them',  [adminProduct::class, 'store'])->name('san-pham.pageAdd');
        Route::post('/them',  [adminProduct::class, 'create'])->name('san-pham.them');
        Route::get('/trang-sua/{id}',  [adminProduct::class, 'edit'])->name('san-pham.pageEdit');
        Route::post('/sua',  [adminProduct::class, 'update'])->name('san-pham.update');
        Route::get('/xoa/{id}',  [adminProduct::class, 'destroy'])->name('san-pham.destroy');
    });
    Route::group(['prefix' => '/'], function () {
        Route::get('/', [adminMain::class, 'index'])->name('trang-chinh.index');
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
            Route::get('/loc-danh-muc', [Home::class, 'pagingCate'])->name('home.paging');
            Route::get('/dang-ky-dang-nhap', [Form::class, 'index'])->name('formRegister');
            Route::post('/dang-nhap', [Form::class, 'login'])->name('login');
            Route::get('/dang-xuat', [Form::class, 'logOut'])->name('logOut');
        });

        // Đăng ký
        Route::group(['prefix' =>  '/dang-ky'], function () {
            Route::post('/', [Form::class, 'register'])->name('register');
            Route::get('/xac-nhan', [Form::class, 'pageConfirm'])->name('register.pageConfirm');
            Route::post('/kiem-tra-xac-nhan', [Form::class, 'confirm'])->name('register.confirm');
        });

        // Trang sản phẩm
        Route::group(['prefix' => '/san-pham'], function () {
            Route::get('/', [Product::class, 'index'])->name('product');
            Route::get('/loc-danh-muc', [Product::class, 'pagingCate'])->name('product.paging');
            Route::get('/loc-gia', [Product::class, 'pagingFilter'])->name('product.filter');
            Route::get('/{slug}', [Product::class, 'productDetail'])->name('product.detail');
            Route::post('/luu-danh-gia', [Product::class, 'saveAssess'])->name('product.saveAssess');
        });
    }
);
