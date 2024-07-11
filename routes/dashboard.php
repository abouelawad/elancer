<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;





Route::group([
  'prefix'=>'categories',
  'as'    =>'categories.',
  'middleware'=>'auth'
],function(){
  Route::get('/', [CategoryController::class, 'index'])->name('name');
  Route::get('/create', [CategoryController::class, 'create'])->name('create');
  Route::get('/{category}', [CategoryController::class, 'show'])->name('show');
  Route::post('/' , [CategoryController::class, 'store'])->name('store');
  Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
  Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
  Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
});