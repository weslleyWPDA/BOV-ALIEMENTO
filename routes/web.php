<?php

use App\Http\Controllers\FazendaADMCont;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosADMCont;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'AdminGroup',], function () {
    Route::resource('usuario', UsuariosADMCont::class);
    Route::post('/usuario/ativo', [UsuariosADMCont::class, 'user_ativo'])->name('user_ativo');

    Route::resource('fazenda', FazendaADMCont::class);
    Route::post('/fazenda/ativo', [FazendaADMCont::class, 'faz_ativo'])->name('faz_ativo');
});
Route::group(['middleware' => 'UserGroup',], function () {
    Route::get('/home', [LoginController::class, 'home'])->name('home');
});

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/logar', [LoginController::class, 'logar'])->name('logar');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
