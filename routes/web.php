<?php

use App\Http\Controllers\OficinaController;
use App\Http\Controllers\livrosController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('/landing', 'landing');
Route::view('/admin', 'admin.dashboard');

Route::get('/oficinas', [OficinaController::class, 'index']);
Route::post('/oficinas', [OficinaController::class, 'store']);

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);

Route::get('/livros', [livrosController::class, 'index']);
Route::post('/livros', [livrosController::class, 'store']);