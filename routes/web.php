<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CartController;

use App\Http\Controllers\StripeController;





Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/product-details/{id}', [HomeController::class, 'detailsProduct'])->name('product-details');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect')->middleware('auth','verified');

Route::middleware('admin')->group(function () {
    Route::get('/add-category', [AdminController::class, 'addCategory'])->name('add-category');
    Route::get('/manage-category', [AdminController::class, 'manageCategory'])->name('manage-category');
    Route::post('/new-category', [AdminController::class, 'newCategory'])->name('new-category');
    Route::post('/update-category/{id}', [AdminController::class, 'updateCategory'])->name('update-category');
    Route::post('/delete-category/{id}', [AdminController::class, 'deleteCategory'])->name('delete-category');
    Route::get('/edit-category/{id}', [AdminController::class, 'editCategory'])->name('edit-category');



    Route::get('/add-product', [ProductController::class, 'addProduct'])->name('add-product');
    Route::get('/manage-product', [ProductController::class, 'manageProduct'])->name('manage-product');
    Route::post('/new-product', [ProductController::class, 'newProduct'])->name('new-product');
    Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
    Route::post('/update-product/{id}', [ProductController::class, 'updateProduct'])->name('update-product');
    Route::post('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');


    Route::get('/order', [AdminController::class, 'order'])->name('manage-order');


    Route::get('/delivered/{id}', [AdminController::class, 'delivered'])->name('delivered');

    Route::get('/print-pdf/{id}', [AdminController::class, 'printw'])->name('print.pdf');

    Route::get('/send-email/{id}', [AdminController::class, 'sendEmail'])->name('send.email');
    Route::post('/send-user-email/{id}', [AdminController::class, 'userEmail'])->name('send.user.email');


    Route::post('/search', [AdminController::class, 'searchData'])->name('search');

});



    Route::post('/add-cart/{id}', [CartController::class, 'addCart'])->name('add-cart');
    Route::get('/show-cart', [HomeController::class, 'showCart'])->name('show-cart');
    Route::post('/remove-cart/{id}', [HomeController::class, 'removeCart'])->name('remove-cart');

    Route::get('/cash-order', [HomeController::class, 'cashOrder'])->name('cash-order');


    Route::get('/stripe/{totalPrice}', [StripeController::class, 'stripe'])->name('stripe');
    Route::post('/stripe-confirm/{totalPrice}', [StripeController::class, 'stripePost'])->name('stripe.post');




    Route::get('/show-order', [HomeController::class, 'showOrder'])->name('show.order');
    Route::get('/cancel-order/{id}', [HomeController::class, 'cancelOrder'])->name('cancel.order');

    Route::post('/add-comment', [HomeController::class, 'addComment'])->name('add.comment');
    Route::post('/add-reply', [HomeController::class, 'addReply'])->name('add.reply');



    Route::post('/product-search', [HomeController::class, 'productSearch'])->name('product.search');

    Route::get('/product-all', [HomeController::class, 'productAll'])->name('product.all');
    Route::post('/search-product', [HomeController::class, 'searchProduct'])->name('search.product');











