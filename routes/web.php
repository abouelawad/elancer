<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    
    return view('welcome');
});
Route::prefix('/categories')->as('categories.')->group(function(){

    Route::get('/', [CategoryController::class, 'index'])->name('name');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::get('/{category}', [CategoryController::class, 'show'])->name('show');
    Route::post('/' , [CategoryController::class, 'store'])->name('store');
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');

});




Route::get('/dashboard', function(){
    return view('layouts.dashboard');
});
