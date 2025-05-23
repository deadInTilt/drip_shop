<?php

use App\Http\Controllers\Admin\Product\ImportController;
use App\Http\Controllers\InterventionImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Shop\Cart\CartController;
use App\Http\Controllers\Shop\Payment\FakeGatewayController;
use App\Http\Controllers\Shop\Payment\PaymentController;
use App\Http\Controllers\Shop\Product\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/test', 'App\Http\Controllers\Shop\Catalog\GroupColorsController');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(['namespace' => 'App\Http\Controllers\Shop', 'middleware' => ['auth']], function () {

    Route::get('/', function () {
        return redirect()->route('shop.home.index');
    });

    Route::group(['namespace' => 'Home', 'prefix' => 'home'], function () {
        Route::get('/', 'IndexController')->name('shop.home.index');
    });

    Route::group(['namespace' => 'Account', 'prefix' => 'account'], function () {
        Route::get('/', 'IndexController')->name('shop.account.index');
    });

    Route::group(['namespace' => 'Address', 'prefix' => 'address'], function () {
        Route::post('/', [\App\Http\Controllers\Shop\Address\AddressController::class, 'store'])
            ->name('shop.address.store')
            ->middleware(['permission:create-addresses']);
        Route::patch('/', [\App\Http\Controllers\Shop\Address\AddressController::class, 'updateMainAddress'])
            ->name('shop.mainAddress.update');
    });

    Route::group(['namespace' => 'Catalog', 'prefix' => 'catalog'], function () {
        Route::get('/', 'IndexController')->name('shop.catalog.index');
    });

    Route::group(['namespace' => 'Cart', 'prefix' => 'cart'], function () {
        Route::get('/', [CartController::class, 'index'])->name('shop.cart.index');
        Route::post('/add', [CartController::class, 'addItemToCart'])->name('shop.cart.add');
        Route::delete('/{item}', [CartController::class, 'removeItemFromCart'])->name('shop.cart.remove');
        Route::post('/apply-coupon', [CartController::class, 'applyCoupon'])->name('shop.cart.applyCoupon');
    });

    Route::group(['namespace' => 'Product', 'prefix' => 'product'], function () {
        Route::get('/{product}', [IndexController::class, 'index'])->name('shop.product.index');
    });

    Route::group(['namespace' => 'Order', 'prefix' => 'order'], function () {
        Route::get('/', 'IndexController')->name('shop.order.index');
        Route::post('/', 'StoreController')->name('shop.order.store');
    });

    Route::group(['namespace' => 'Payment', 'prefix' => 'payment', 'middleware' => ['auth']], function () {
        Route::get('/checkout/{orderId}', [PaymentController::class, 'initiate'])->name('shop.payment.initiate');
        Route::get('/fake-gateway/{orderId}', [FakeGatewayController::class, 'showForm'])->name('shop.payment.fake-gateway');
        Route::post('/fake-gateway/process', [FakeGatewayController::class, 'processPayment'])->name('shop.payment.process');
        Route::post('/callback', [PaymentController::class, 'callback'])->name('shop.payment.callback');
        Route::get('/status/{orderId}', [PaymentController::class, 'status'])->name('shop.payment.status');
    });
});

Route::get('/storage/images/{dir}/{method}/{size}/{file}', InterventionImageController::class)
     ->where('method', 'resize|crop|fit')
     ->where('size', '\d+x\d+')
     ->where('file', '.+\.(png|jpg|jpeg|gif|webp)$')
     ->name('intervention-image');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin.index');

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index')->middleware(['permission:view-categories']);
        Route::get('/create', 'CreateController')->name('admin.category.create')->middleware(['permission:create-categories']);
        Route::post('/', 'StoreController')->name('admin.category.store')->middleware(['permission:create-categories']);
        Route::get('/{category}', 'ShowController')->name('admin.category.show')->middleware(['permission:view-categories']);
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit')->middleware(['permission:edit-categories']);
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update')->middleware(['permission:edit-categories']);
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete')->middleware(['permission:delete-categories']);
    });


    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index')->middleware(['permission:view-tags']);
        Route::get('/create', 'CreateController')->name('admin.tag.create')->middleware(['permission:create-tags']);
        Route::post('/', 'StoreController')->name('admin.tag.store')->middleware(['permission:create-tags']);
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show')->middleware(['permission:view-tags']);
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit')->middleware(['permission:edit-tags']);
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update')->middleware(['permission:edit-tags']);
        Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete')->middleware(['permission:delete-tags']);
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index')->middleware(['permission:view-users']);
        Route::get('/create', 'CreateController')->name('admin.user.create')->middleware(['permission:create-users']);
        Route::post('/', 'StoreController')->name('admin.user.store')->middleware(['permission:create-users']);
        Route::get('/{user}', 'ShowController')->name('admin.user.show')->middleware(['permission:view-users']);
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit')->middleware(['permission:edit-users']);
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update')->middleware(['permission:edit-users']);
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete')->middleware(['permission:delete-users']);
    });

    Route::group(['namespace' => 'Brand', 'prefix' => 'brands'], function () {
        Route::get('/', 'IndexController')->name('admin.brand.index')->middleware(['permission:view-brands']);
        Route::get('/create', 'CreateController')->name('admin.brand.create')->middleware(['permission:create-brands']);
        Route::post('/', 'StoreController')->name('admin.brand.store')->middleware(['permission:create-brands']);
        Route::get('/{brand}', 'ShowController')->name('admin.brand.show')->middleware(['permission:view-brands']);
        Route::get('/{brand}/edit', 'EditController')->name('admin.brand.edit')->middleware(['permission:edit-brands']);
        Route::patch('/{brand}', 'UpdateController')->name('admin.brand.update')->middleware(['permission:edit-brands']);
        Route::delete('/{brand}', 'DeleteController')->name('admin.brand.delete')->middleware(['permission:delete-brands']);
    });

    Route::group(['namespace' => 'Role', 'prefix' => 'roles'], function () {
        Route::get('/', 'IndexController')->name('admin.role.index')->middleware(['permission:view-roles']);
        Route::get('/create', 'CreateController')->name('admin.role.create')->middleware(['permission:create-roles']);
        Route::post('/', 'StoreController')->name('admin.role.store')->middleware(['permission:create-roles']);
        Route::get('/{role}', 'ShowController')->name('admin.role.show')->middleware(['permission:view-roles']);
        Route::get('/{role}/edit', 'EditController')->name('admin.role.edit')->middleware(['permission:edit-roles']);
        Route::patch('/{role}', 'UpdateController')->name('admin.role.update')->middleware(['permission:edit-roles']);
        Route::delete('/{role}', 'DeleteController')->name('admin.role.delete')->middleware(['permission:delete-roles']);
    });

    Route::group(['namespace' => 'Product', 'prefix' => 'products'], function () {
        Route::get('/', 'IndexController')->name('admin.product.index')->middleware(['permission:view-products']);
        Route::get('/create', 'CreateController')->name('admin.product.create')->middleware(['permission:create-products']);
        Route::get('/import', [ImportController::class, 'index'])->name('admin.product.import-index')->middleware(['permission:create-products']);
        Route::post('/import', [ImportController::class, 'import'])->name('admin.product.import')->middleware(['permission:create-products']);
        Route::post('/', 'StoreController')->name('admin.product.store')->middleware(['permission:create-products']);
        Route::get('/{product}', 'ShowController')->name('admin.product.show')->middleware(['permission:view-products']);
        Route::get('/{product}/edit', 'EditController')->name('admin.product.edit')->middleware(['permission:edit-products']);
        Route::patch('/{product}', 'UpdateController')->name('admin.product.update')->middleware(['permission:edit-products']);
        Route::delete('/{product}', 'DeleteController')->name('admin.product.delete')->middleware(['permission:delete-products']);
    });

    Route::group(['namespace' => 'Color', 'prefix' => 'colors'], function () {
        Route::get('/', 'IndexController')->name('admin.color.index')->middleware(['permission:view-colors']);
        Route::get('/create', 'CreateController')->name('admin.color.create')->middleware(['permission:create-colors']);
        Route::post('/', 'StoreController')->name('admin.color.store')->middleware(['permission:create-colors']);
        Route::get('/{color}', 'ShowController')->name('admin.color.show')->middleware(['permission:view-colors']);
        Route::get('/{color}/edit', 'EditController')->name('admin.color.edit')->middleware(['permission:edit-colors']);
        Route::patch('/{color}', 'UpdateController')->name('admin.color.update')->middleware(['permission:edit-colors']);
        Route::delete('/{color}', 'DeleteController')->name('admin.color.delete')->middleware(['permission:delete-colors']);
    });

    Route::group(['namespace' => 'Group', 'prefix' => 'groups'], function () {
        Route::get('/', 'IndexController')->name('admin.group.index')->middleware(['permission:view-groups']);
        Route::get('/create', 'CreateController')->name('admin.group.create')->middleware(['permission:create-groups']);
        Route::post('/', 'StoreController')->name('admin.group.store')->middleware(['permission:create-groups']);
        Route::get('/{group}', 'ShowController')->name('admin.group.show')->middleware(['permission:view-groups']);
        Route::get('/{group}/edit', 'EditController')->name('admin.group.edit')->middleware(['permission:edit-groups']);
        Route::patch('/{group}', 'UpdateController')->name('admin.group.update')->middleware(['permission:edit-groups']);
        Route::delete('/{group}', 'DeleteController')->name('admin.group.delete')->middleware(['permission:delete-groups']);
    });

    Route::group(['namespace' => 'Coupon', 'prefix' => 'coupons'], function () {
        Route::get('/', 'IndexController')->name('admin.coupon.index')->middleware(['permission:view-coupons']);
        Route::get('/create', 'CreateController')->name('admin.coupon.create')->middleware(['permission:create-coupons']);
        Route::post('/', 'StoreController')->name('admin.coupon.store')->middleware(['permission:create-coupons']);
        Route::get('/{coupon}', 'ShowController')->name('admin.coupon.show')->middleware(['permission:view-coupons']);
        Route::get('/{coupon}/edit', 'EditController')->name('admin.coupon.edit')->middleware(['permission:edit-coupons']);
        Route::patch('/{coupon}', 'UpdateController')->name('admin.coupon.update')->middleware(['permission:edit-coupons']);
        Route::delete('/{coupon}', 'DeleteController')->name('admin.coupon.delete')->middleware(['permission:delete-coupons']);
    });

    Route::group(['namespace' => 'Order', 'prefix' => 'orders'], function () {
        Route::get('/', 'IndexController')->name('admin.order.index')->middleware(['permission:view-orders']);
        Route::get('/{order}', 'ShowController')->name('admin.order.show')->middleware(['permission:view-orders']);
//        Route::get('/{order}/edit', 'EditController')->name('admin.order.edit');
//        Route::patch('/{order}', 'UpdateController')->name('admin.order.update');
        Route::delete('/{order}', 'DeleteController')->name('admin.order.delete')->middleware(['permission:delete-orders']);
    });
});
