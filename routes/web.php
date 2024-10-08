<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('landing', 'layouts-landing-page.login');  //trial Route::view style


Route::group(['middleware'=>['auth'],
                'prefix' =>'dashboard',
                'as' => 'dashboard.'
            ],function(){
                Route::get('/',function(){
                        return view('layouts-hireo.index');
                        });
                Route::view('/edit','freelancer/profiles.edit')->name('profile.edit');

            }
);

// Route::get('/dashboard', function () {
//     return view('layouts-landing-page.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

