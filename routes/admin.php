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

    /*Models*/
    Route::get('/models', [AdminController::class, 'modellist'])->name('models');
    //Route::post('/add-brand',[AdminController::class, 'brandPost'])->name('brandPost');
    //Route::get('/edit-brand/{id}', [AdminController::class,'editBrand'])->name('editBrand');
    //Route::post('/edit-brand/{id}', [AdminController::class,'updateBrand'])->name('updateBrand');
    //Route::post('/delete-brand',[AdminController::class, 'destroyBrand'])->name('destroyBrand');


    /*Models*/
    Route::get('/offers', [AdminController::class, 'offers'])->name('offers');

});
?>

