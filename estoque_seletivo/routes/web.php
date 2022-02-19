<?php

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

use App\Http\Controllers\ProdutoController;

Route::get('/', [ProdutoController::class, 'index']);
Route::get('/produtos/create', [ProdutoController::class, 'create'])->middleware('auth');
Route::post('/produtos', [ProdutoController::class, 'store']);



// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('home');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/', [ProdutoController::class, 'index']);
Route::get('/about', function () {
    return view('about');
});


Route::middleware(['auth:sanctum'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');