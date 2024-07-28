<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Freelancer\ProfileController;





Route::group([
  'prefix'=>'freelancer',
  'as'    =>'freelance.profile.',
  'middleware'=>'auth'
],function(){
  Route::get('/' , [ProfileController::class, 'index'])->name('index');
  Route::get('/create', [ProfileController::class, 'create'])->name('create');
  // Route::get('/{profile}', [ProfileController::class, 'show'])->name('show');
  // Route::post('/' , [ProfileController::class, 'store'])->name('store');
  Route::get('/edit/{profile?}', [ProfileController::class, 'edit'])->name('edit');
  Route::put('/', [ProfileController::class, 'update'])->name('update');
  Route::delete('/{profile}', [ProfileController::class, 'destroy'])->name('destroy');
});