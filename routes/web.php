<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Homecontroller;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\Cart\CartController;
use App\Http\Controllers\Admin\Size\SizeController;
use App\Http\Controllers\Admin\Color\ColorController;
use App\Http\Controllers\Admin\Users\InforController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\LogoutController;
use App\Http\Controllers\Admin\Users\RegisterController;
use App\Http\Controllers\User\Contact\ContactController;
use App\Http\Controllers\User\CuaHang\CuahangController;
use App\Http\Controllers\User\Checkout\CheckoutController;
use App\Http\Controllers\Admin\Users\ChangeinforController;
use App\Http\Controllers\User\Comment\SendCommentController;
use App\Http\Controllers\Admin\listCustomer\CustomerController;
use App\Http\Controllers\User\ProductDetail\ProductDetailController;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'insert']);
Route::get('/logout', [LogoutController::class, 'index'])->name('logout');
Route::get('/home', [Homecontroller::class, 'index'])->name('user');

Route::middleware(['auth'])->group(function () {

    Route::prefix('/admin')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin');


        # menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        # product
        Route::prefix('product')->group(function () {
            Route::get('addproduct', [ProductController::class, 'create']);
            Route::post('addproduct', [ProductController::class, 'store']);
            Route::get('listproduct', [ProductController::class, 'show']);
            Route::get('edit/{product}', [ProductController::class, 'edit']);
            Route::post('edit/{id}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        #color
        Route::prefix('/color')->group(function () {
            Route::get('/add', [ColorController::class, 'add']);
            Route::post('/add', [ColorController::class, 'store']);
            Route::get('/list', [ColorController::class, 'index']);
            Route::get('/edit/{color}', [ColorController::class, 'edit']);
            Route::post('/edit/{color}', [ColorController::class, 'update']);
            Route::DELETE('/destroy', [ColorController::class, 'destroy']);
        });

        #size
        Route::prefix('size')->group(function () {
            Route::get('add', [SizeController::class, 'add']);
            Route::post('add', [SizeController::class, 'store']);
            Route::get('list', [SizeController::class, 'index']);
            Route::get('edit/{size}', [SizeController::class, 'edit']);
            Route::post('edit/{size}', [SizeController::class, 'update']);
            Route::DELETE('destroy', [SizeController::class, 'destroy']);
        });

        #Customer (đơn đặt hàng)
        Route::prefix('/listCustomer')->group(function () {
            Route::get('/', [CustomerController::class, 'index'])->name('listCustomer');
            Route::get('/{customer}', [CustomerController::class, 'inforCart']);
            Route::DELETE('destroy', [CustomerController::class, 'destroy']);
        });

        #upload
        Route::post('upload/services', [UploadController::class, 'store']);
    });

    // User
    Route::get('/infor', [InforController::class, 'index']);
    Route::get('/changeinfor/{id}', [ChangeinforController::class, 'index']);
    Route::post('/updateinfor', [ChangeinforController::class, 'update']);
});

#upload
Route::post('upload/services', [UploadController::class, 'store']);

// Trang cửa hàng
Route::prefix('/cuahang')->group(function () {
    Route::get('/', [CuahangController::class, 'index']);

    // Trang chi tiết sản phẩm
    Route::get('/{id}/{slug}', [ProductDetailController::class, 'index']);

    // Trang cửa hàng theo danh mục
    Route::get('/{id}-{slug}.html', [CuahangController::class, 'indexById']);
});

// Thêm vào giỏ hàng
Route::post('/add-cart', [CartController::class, 'index']);

//Hiển thị trang giỏ hàng
Route::get('/cart', [CartController::class, 'show']);
Route::get('/carts/delete/{id}', [CartController::class, 'remove']);
Route::post('/update', [CartController::class, 'update']);


//Check out - Thủ tục thanh toán
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'addCart']);


// Trang liên hệ
Route::get('/lienhe', [ContactController::class, 'index']);
Route::post('/lienhe', [ContactController::class, 'sendmessage']);

// Viết bình luận
Route::post('/send_comment', [SendCommentController::class, 'sendcomment']);
