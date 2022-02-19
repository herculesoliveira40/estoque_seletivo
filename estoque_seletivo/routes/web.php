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
Route::get('/produtos/{id}', [ProdutoController::class, 'show']);


Route::get('/produtos/edit/{id}', [ProdutoController::class, 'edit'])->middleware('auth');
Route::put('/produtos/update/{id}', [ProdutoController::class, 'update'])->middleware('auth');

Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy'])->middleware('auth');






// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('home');
// })->name('dashboard');
Route::middleware([])->get('/', [ProdutoController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');






Route::get('/sobre', function () {
    return view('sobre');
});
Route::get('/contato', function () {
    return view('contato');
});


Route::get('/produtos/dashboard', [ProdutoController::class, 'dashboard'])->middleware('auth');
