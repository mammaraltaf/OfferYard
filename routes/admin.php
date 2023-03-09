<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    Route::post('/categoryPost',[AdminController::class, 'categoryPost'])->name('categoryPost');
    Route::get('/edit-category/{id}', [AdminController::class,'editCategory'])->name('editCategory');
    Route::post('/edit-category/{id}', [AdminController::class,'updateCategory'])->name('updateCategory');
    Route::post('/destroyCategory',[AdminController::class, 'destroyCategory'])->name('destroyCategory');

    Route::get('/users',[AdminController::class, 'users'])->name('users');
});
?>

