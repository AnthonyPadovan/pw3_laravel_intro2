<?php

use App\Models\User;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\livrosController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::view('/landing', 'landing');

// Rotas da Agenda de Eventos
Route::get('/eventos', [EventoController::class, 'index']);
Route::get('/eventos/novo', [EventoController::class, 'create']);
Route::post('/eventos', [EventoController::class, 'store']);

Route::get('/oficinas', [OficinaController::class, 'index']);
Route::post('/oficinas', [OficinaController::class, 'store']);

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);

Route::get('/livros', [livrosController::class, 'index']);
Route::post('/livros', [livrosController::class, 'store']);

Route::get('/teste-orm', function () {
    User::create([
        'name' => 'Ana Clara Santos',
        'email' => 'ana.santos.sp.gov.br',
        'password' => ('12345678')

    ]);

    return User::all();
});

// CRUD de usuários
Route::get('/admin', [UserController::class, 'index']);
Route::get('/usuarios/novo', [UserController::class, 'create']);
Route::post('/usuarios', [UserController::class, 'store']);
Route::delete('/usuarios/{user}', [UserController::class, 'destroy'])->name('usuarios.destroy');
