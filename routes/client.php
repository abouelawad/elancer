<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Client\ProjectController;

Route::group([
  'prefix'=>'client/projects',
  'as'    =>'client.projects.',
  'middleware'=>'auth'
],function(){
  Route::get('/', [ProjectController::class, 'index'])->name('index');
  Route::get('/create', [ProjectController::class, 'create'])->name('create');
  Route::get('/{project}', [ProjectController::class, 'show'])->name('show');
  Route::post('/' , [ProjectController::class, 'store'])->name('store');
  Route::get('/edit/{project}', [ProjectController::class, 'edit'])->name('edit');
  Route::put('/{project}', [ProjectController::class, 'update'])->name('update');
  Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('destroy');
});