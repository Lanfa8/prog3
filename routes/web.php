<?php

use App\Http\Controllers\RecadosController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuariosController;
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
    return view('home', ['pagina' => 'home']);
})->name('home');

Route::get('produtos', [ProdutosController::class, 'index'])->name('produtos');

Route::get('/produtos/inserir', [ProdutosController::class, 'create'])->name('produtos.inserir');

Route::post('/produtos/inserir', [ProdutosController::class, 'insert'])->name('produtos.gravar');

Route::get('/produtos/{prod}', [ProdutosController::class, 'show'])->name('produtos.show');

Route::get('/produtos/{prod}/editar', [ProdutosController::class, 'edit'])->name('produtos.edit');

Route::put('/produtos/{prod}/editar', [ProdutosController::class, 'update'])->name('produtos.update');

Route::get('/produtos/{prod}/apagar', [ProdutosController::class, 'remove'])->name('produtos.remove');

Route::delete('/produtos/{prod}/apagar', [ProdutosController::class, 'delete'])->name('produtos.delete');

Route::get('usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');

Route::prefix('usuarios')->group(function() {
    
    Route::get('/inserir', [UsuariosController::class, 'create'])->name('usuarios.inserir');
    Route::post('/inserir', [UsuariosController::class, 'insert'])->name('usuarios.gravar');

});

Route::get('/login', [UsuariosController::class, 'login'])->name('login');
Route::post('/login', [UsuariosController::class, 'login']);

Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');

// rotas para recados

Route::get('recados', [RecadosController::class, 'index'])->name('recados');

Route::get('/recados/inserir', [RecadosController::class, 'create'])->name('recados.inserir');

Route::post('/recados/inserir', [RecadosController::class, 'store'])->name('recados.gravar');

Route::get('/recados/{recado}', [RecadosController::class, 'show'])->name('recados.show');

Route::get('/recados/{recado}/editar', [RecadosController::class, 'edit'])->name('recados.edit');

Route::put('/recados/{recado}/editar', [RecadosController::class, 'update'])->name('recados.update');

Route::get('/recados/{recado}/apagar', [RecadosController::class, 'remove'])->name('recados.remove');

Route::delete('/recados/{recado}/apagar', [RecadosController::class, 'destroy'])->name('recados.destroy');