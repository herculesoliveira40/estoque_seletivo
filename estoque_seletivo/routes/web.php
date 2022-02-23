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

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EstoqueController;

                    // Rotas Categorias
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::get('/categorias/create', [CategoriaController::class, 'create'])->middleware('auth');
Route::post('/categorias', [CategoriaController::class, 'store']);
Route::get('/categorias/painel', [CategoriaController::class, 'painel'])->middleware('auth');


Route::get('/categorias/edit/{id}', [CategoriaController::class, 'edit'])->middleware('auth');
Route::put('/categorias/update/{id}', [CategoriaController::class, 'update'])->middleware('auth');


                    // Rotas Produtos
Route::get('/', [ProdutoController::class, 'index']);
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produtos/painel', [ProdutoController::class, 'painel'])->middleware('auth');
Route::get('/produtos/create', [ProdutoController::class, 'create'])->middleware('auth');
Route::post('/produtos', [ProdutoController::class, 'store']);
Route::get('/produtos/{id}', [ProdutoController::class, 'show']);

Route::get('/produtos/edit/{id}', [ProdutoController::class, 'edit'])->middleware('auth');
Route::put('/produtos/update/{id}', [ProdutoController::class, 'update'])->middleware('auth');

Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy'])->middleware('auth');


                    // Rotas Estoques
Route::get('/estoques', [EstoqueController::class, 'index']);
Route::get('/estoques/historico', [EstoqueController::class, 'historico']);
Route::get('/estoques/view', [EstoqueController::class, 'viewRelatorio']);
Route::get('/estoques/create', [EstoqueController::class, 'create'])->middleware('auth');
Route::post('/estoques', [EstoqueController::class, 'store']);
Route::get('/estoques/painel', [EstoqueController::class, 'painel'])->middleware('auth');


Route::get('/estoques/edit/{id}', [EstoqueController::class, 'edit'])->middleware('auth');
Route::put('/estoques/update/{id}', [EstoqueController::class, 'update'])->middleware('auth');

Route::delete('/estoques/{id}', [EstoqueController::class, 'destroy'])->middleware('auth');









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


