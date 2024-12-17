<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas para páginas reutilizando layouts
Route::get('/home', function () {
    return view('home'); // Página inicial com layout
})->name('home');

Route::get('/about', function () {
    return view('about'); // Página "Sobre" com layout
})->name('about');

// Grupo de rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    // Rotas de gerenciamento de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rotas de gerenciamento de produtos
    Route::prefix('produtos')->name('produtos.')->group(function () {
        Route::get('/', [ProdutoController::class, 'index'])->name('index'); // Listar produtos
        Route::get('/create', [ProdutoController::class, 'create'])->name('create'); // Formulário de criação
        Route::post('/', [ProdutoController::class, 'store'])->name('store'); // Salvar produto
        Route::get('/{produto}/edit', [ProdutoController::class, 'edit'])->name('edit'); // Formulário de edição
        Route::put('/{produto}', [ProdutoController::class, 'update'])->name('update'); // Atualizar produto
        Route::delete('/{produto}', [ProdutoController::class, 'destroy'])->name('destroy'); // Excluir produto
    });
});

require __DIR__ . '/auth.php';
