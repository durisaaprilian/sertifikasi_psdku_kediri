<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/arsip', function () {
    return view('layouts.arsip.index');
});
Route::get('/about', function () {
    return view('layouts.arsip.about');
});
Route::get('/tambaharsip', function () {
    return view('layouts.arsip.tambaharsip');
});
Route::get('/viewarsip', function () {
    return view('layouts.arsip.viewarsip');
});

Route::get('/delete/{id}', [ArsipController::class, 'delete'])->name('delete');
Route::get('/show/{id}', [ArsipController::class, 'show'])->name('show');
Route::resource('arsip', ArsipController::class);