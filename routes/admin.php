<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModelsController;

/*
|--------------------------------------------------------------------------
| Seller Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'admin','as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/category',[AdminController::class, 'category'])->name('category');
    Route::post('/add-category',[AdminController::class, 'categoryPost'])->name('categoryPost');
    Route::get('/edit-category/{id}', [AdminController::class,'editCategory'])->name('editCategory');
    Route::post('/edit-category/{id}', [AdminController::class,'updateCategory'])->name('updateCategory');
    Route::post('/delete-category',[AdminController::class, 'destroyCategory'])->name('destroyCategory');

    /*User*/
    Route::get('/users',[AdminController::class, 'users'])->name('users');
    Route::post('/add-user',[AdminController::class, 'userPost'])->name('userPost');
    Route::get('/edit-user/{id}', [AdminController::class,'editUser'])->name('editUser');
    Route::post('/edit-user/{id}', [AdminController::class,'updateUser'])->name('updateUser');
    Route::post('/delete-user',[AdminController::class, 'destroyUser'])->name('destroyUser');

    /*Brand*/
    Route::get('/brands',[AdminController::class, 'brands'])->name('brands');
    Route::post('/add-brand',[AdminController::class, 'brandPost'])->name('brandPost');
    Route::get('/edit-brand/{id}', [AdminController::class,'editBrand'])->name('editBrand');
    Route::post('/edit-brand/{id}', [AdminController::class,'updateBrand'])->name('updateBrand');
    Route::post('/delete-brand',[AdminController::class, 'destroyBrand'])->name('destroyBrand');

    /*Purchasing Year*/
    Route::get('/purchasing-year',[AdminController::class, 'purchasingYear'])->name('purchasingYear');
    Route::post('/add-purchasing-year',[AdminController::class, 'purchasingYearPost'])->name('purchasingYearPost');
    Route::get('/edit-purchasing-year/{id}', [AdminController::class,'editPurchasingYear'])->name('editPurchasingYear');
    Route::post('/edit-purchasing-year/{id}', [AdminController::class,'updatePurchasingYear'])->name('updatePurchasingYear');
    Route::post('/delete-purchasing-year',[AdminController::class, 'destroyPurchasingYear'])->name('destroyPurchasingYear');

    /*Models*/
    Route::get('/models', [AdminController::class, 'models'])->name('models');
    Route::post('/add-model',[AdminController::class, 'modelPost'])->name('modelPost');
    Route::get('/edit-model/{id}', [AdminController::class,'editModel'])->name('editModel');
    Route::post('/edit-model/{id}', [AdminController::class,'updateModel'])->name('updateModel');
    Route::post('/delete-model',[AdminController::class, 'destroyModel'])->name('destroyModel');

    /*Ajax calls for getting brands and models based on id*/
    Route::get('/get-brands/{category_id}', [AdminController::class, 'getBrands'])->name('getBrands');
    Route::get('/get-models/{brand_id}', [AdminController::class, 'getModel'])->name('getModel');

    /*Offers*/
    Route::get('/offers', [AdminController::class, 'offers'])->name('offers');
    Route::post('/add-offer',[AdminController::class, 'offerPost'])->name('offerPost');
    Route::get('/edit-offer/{id}', [AdminController::class,'editOffer'])->name('editOffer');
    Route::post('/edit-offer/{id}', [AdminController::class,'updateOffer'])->name('updateOffer');
    Route::post('/delete-offer',[AdminController::class, 'destroyOffer'])->name('destroyOffer');
});
?>

