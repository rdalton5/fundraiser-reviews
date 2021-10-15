<?php

use App\Http\Controllers\FundraiserController;
use App\Http\Controllers\FundraiserReviewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::user()) {
        return redirect('/fundraisers');
    } else {
        return view('welcome');
    }
});

Route::resource('/fundraisers', FundraiserController::class)
    ->middleware(['auth']);
Route::resource('/fundraiser-reviews', FundraiserReviewController::class)
    ->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
