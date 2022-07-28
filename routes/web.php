<?php

use App\Http\Controllers\admin\adminAssess;
use App\Http\Controllers\admin\adminBill;
use App\Http\Controllers\admin\adminCate;
use App\Http\Controllers\admin\adminCustomer;
use App\Http\Controllers\admin\adminMain;
use App\Http\Controllers\admin\adminPost;
use App\Http\Controllers\admin\adminProduct;
use App\Http\Controllers\admin\adminStaff;
use App\Http\Controllers\client\Cart;
use App\Http\Controllers\client\Contact;
use App\Http\Controllers\client\Form;
use App\Http\Controllers\client\Home;
use App\Http\Controllers\client\Introduce;
use App\Http\Controllers\client\News;
use App\Http\Controllers\client\Pay;
use App\Http\Controllers\client\Product;
use App\Models\admin;
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
    // Trang chính
    Route::group(['prefix' => '/'], function () {
        Route::get('/', [adminMain::class, 'index'])->name('trang-chinh.index');
    });

    // Đánh giá của khách hàng
    Route::group(['prefix' => '/danh-gia'], function () {
        Route::get('/', [adminAssess::class, 'index'])->name('danh-gia.index');
        Route::post('/sua-danh-gia', [adminAssess::class, 'update'])->name('danh-gia.update');
        Route::get('/xoa/{id}', [adminAssess::class, 'destroy'])->name('danh-gia.delete');
    });

    Route::group(['prefix' => '/khach-hang'], function () {
        Route::get('/', [adminCustomer::class, 'index'])->name('khach-hang.index');
        Route::get('/xoa/{id}', [adminCustomer::class, 'delete'])->name('khach-hang.delete');
    });

    Route::group(['prefix' => '/nhan-vien'], function () {
        Route::get('/', [adminStaff::class, 'index'])->name('nhan-vien.index');
        Route::post('/them', [adminStaff::class, 'create'])->name('nhan-vien.create');
        Route::get('/xoa/{id}', [adminStaff::class, 'delete'])->name('nhan-vien.delete');
    });

    Route::group(['prefix' => '/hoa-don'], function () {
        Route::get('/', [adminBill::class, 'index'])->name('hoa-don.index');
        Route::get('/sua-trang-thai', [adminBill::class, 'changStatus'])->name('hoa-don.changeStatus');
        Route::get('/chi-tiet/{id}', [adminBill::class, 'detail'])->name('hoa-don.detail');
        Route::post('/update/{id}', [adminBill::class, 'update'])->name('hoa-don.update');
    });

    Route::group(['prefix' => '/tin-tuc'], function () {
        Route::get('/', [adminPost::class, 'index'])->name('tin-tuc.index');
        Route::get('/them', [adminPost::class, 'store'])->name('tin-tuc.store');
        Route::post('/luu', [adminPost::class, 'create'])->name('tin-tuc.create');
        Route::get('/xoa/{id}', [adminPost::class, 'delete'])->name('tin-tuc.delete');
        Route::get('/sua/{id}', [adminPost::class, 'edit'])->name('tin-tuc.edit');
        Route::post('/luu-sua', [adminPost::class, 'update'])->name('tin-tuc.update');
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
            Route::get('/tin-tuc', [News::class, 'index'])->name('new.index');
            Route::get('/tin-tuc/{slug}', [News::class, 'newDetail'])->name('new.detail');
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
        Route::group(['prefix' => '/gio-hang'], function () {
            Route::get('/', [Cart::class, 'index'])->name('cart');
            Route::post('/them', [Cart::class, 'addCart'])->name('addCart');
            Route::get('/xoa-gio-hang/{id}', [Cart::class, 'deleteCart'])->name('deleteCart');
        });
        Route::group(['prefix' => '/thanh-toan'], function () {
            Route::get('/', [Pay::class, 'index'])->name('pagePay');
            Route::post('/luu-hoa-don', [Pay::class, 'storeBill'])->name('storeBill');
        });
    }
);
