<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de productos
Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'categories')->name('products.categories');
    Route::get('/products/index', 'index')->name('products.index');
    Route::get('/products/camisetas', 'camisetas')->name('products.camisetas');
    Route::get('/products/sudaderas', 'sudaderas')->name('products.sudaderas');
    Route::get('/products/gorras', 'gorras')->name('products.gorras');
});

Route::get('/dashboard', function () {
    return redirect()->route('profile.edit');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'index')->name('cart.index');
        Route::post('/cart/add', 'add')->name('cart.add');
        Route::delete('/cart/{id}', 'remove')->name('cart.remove');
        Route::post('/cart/process-payment', 'processPayment')->name('cart.process-payment');
    });

    // Rutas de pago
    Route::post('/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');
    Route::get('/checkout/success', [PaymentController::class, 'success'])->name('payment.success');
});

// Rutas del panel de administración
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        if (!Auth::user() || !Auth::user()->is_admin) {
            return redirect('/');
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
        Route::resource('products', AdminProductController::class)->names('admin.products');
    });
});

require __DIR__.'/auth.php';
