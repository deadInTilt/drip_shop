<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Shop\Cart\CartController;
use App\Http\Controllers\Shop\Catalog\IndexController;
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

    Route::group(['namespace' => 'Catalog', 'prefix' => 'catalog'], function () {
        Route::get('/', 'IndexController')->name('shop.catalog.index');
    });

    Route::group(['namespace' => 'Cart', 'prefix' => 'cart'], function () {
        Route::get('/', [CartController::class, 'index'])->name('shop.cart.index');
        Route::post('/add', [CartController::class, 'add'])->name('shop.cart.add');
        Route::delete('/{item}', [CartController::class, 'remove'])->name('shop.cart.remove');
    });

    Route::group(['namespace' => 'Product', 'prefix' => 'product'], function () {
        Route::get('/{product}', 'IndexController')->name('shop.product.index');
    });

    Route::group(['namespace' => 'Order', 'prefix' => 'order'], function () {
        Route::get('/', 'IndexController')->name('shop.order.index');
        Route::post('/', 'StoreController')->name('shop.order.store');
    });

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin.index');

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
    });


    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
    });

    Route::group(['namespace' => 'Brand', 'prefix' => 'brands'], function () {
        Route::get('/', 'IndexController')->name('admin.brand.index');
        Route::get('/create', 'CreateController')->name('admin.brand.create');
        Route::post('/', 'StoreController')->name('admin.brand.store');
        Route::get('/{brand}', 'ShowController')->name('admin.brand.show');
        Route::get('/{brand}/edit', 'EditController')->name('admin.brand.edit');
        Route::patch('/{brand}', 'UpdateController')->name('admin.brand.update');
        Route::delete('/{brand}', 'DeleteController')->name('admin.brand.delete');
    });

    Route::group(['namespace' => 'Role', 'prefix' => 'roles'], function () {
        Route::get('/', 'IndexController')->name('admin.role.index');
        Route::get('/create', 'CreateController')->name('admin.role.create');
        Route::post('/', 'StoreController')->name('admin.role.store');
        Route::get('/{role}', 'ShowController')->name('admin.role.show');
        Route::get('/{role}/edit', 'EditController')->name('admin.role.edit');
        Route::patch('/{role}', 'UpdateController')->name('admin.role.update');
        Route::delete('/{role}', 'DeleteController')->name('admin.role.delete');
    });

    Route::group(['namespace' => 'Product', 'prefix' => 'products'], function () {
        Route::get('/', 'IndexController')->name('admin.product.index');
        Route::get('/create', 'CreateController')->name('admin.product.create');
        Route::post('/', 'StoreController')->name('admin.product.store');
        Route::get('/{product}', 'ShowController')->name('admin.product.show');
        Route::get('/{product}/edit', 'EditController')->name('admin.product.edit');
        Route::patch('/{product}', 'UpdateController')->name('admin.product.update');
        Route::delete('/{product}', 'DeleteController')->name('admin.product.delete');
    });

    Route::group(['namespace' => 'Color', 'prefix' => 'colors'], function () {
        Route::get('/', 'IndexController')->name('admin.color.index');
        Route::get('/create', 'CreateController')->name('admin.color.create');
        Route::post('/', 'StoreController')->name('admin.color.store');
        Route::get('/{color}', 'ShowController')->name('admin.color.show');
        Route::get('/{color}/edit', 'EditController')->name('admin.color.edit');
        Route::patch('/{color}', 'UpdateController')->name('admin.color.update');
        Route::delete('/{color}', 'DeleteController')->name('admin.color.delete');
    });

    Route::group(['namespace' => 'Group', 'prefix' => 'groups'], function () {
        Route::get('/', 'IndexController')->name('admin.group.index');
        Route::get('/create', 'CreateController')->name('admin.group.create');
        Route::post('/', 'StoreController')->name('admin.group.store');
        Route::get('/{group}', 'ShowController')->name('admin.group.show');
        Route::get('/{group}/edit', 'EditController')->name('admin.group.edit');
        Route::patch('/{group}', 'UpdateController')->name('admin.group.update');
        Route::delete('/{group}', 'DeleteController')->name('admin.group.delete');
    });

    Route::group(['namespace' => 'Order', 'prefix' => 'orders'], function () {
        Route::get('/', 'IndexController')->name('admin.order.index');
        Route::get('/{order}', 'ShowController')->name('admin.order.show');
//        Route::get('/{order}/edit', 'EditController')->name('admin.order.edit');
//        Route::patch('/{order}', 'UpdateController')->name('admin.order.update');
        Route::delete('/{order}', 'DeleteController')->name('admin.order.delete');
    });
});
