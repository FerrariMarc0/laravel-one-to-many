<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\TypeController;

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

Route::get('/', function(){
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('dashboard', [DashBoardController::class, 'index'])->name('dashboard');
    Route::resource('portfolios', PortfolioController::class)->parameters(['portfolios'=>'portfolio:slug']);
    Route::resource('types', TypeController::class)->parameters(['types'=>'type:slug']);
});

require __DIR__.'/auth.php';
