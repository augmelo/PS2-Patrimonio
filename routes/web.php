<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Patrimony\PatrimonyController;
use App\Http\Controllers\Place\PlaceController;
use App\Http\Controllers\Sector\SectorController;
use App\Http\Controllers\Component\ComponentController;
use App\Http\Controllers\Type\TypeController;
use App\Http\Controllers\User\{UserController, CommomUserController};

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function(){
    
    Route::get('patrimonios', [PatrimonyController::class, 'index'])->name('patrimony.index');
    Route::get('locais', [PlaceController::class, 'index'])->name('place.index');
    Route::get('setores', [SectorController::class, 'index'])->name('sector.index');
    Route::get('componentes', [ComponentController::class, 'index'])->name('component.index');
    Route::get('modelos', [TypeController::class, 'index'])->name('type.index');

    Route::middleware('user.admin')->group(function(){
        Route::get('patrimonios/criar', [PatrimonyController::class, 'create'])->name('patrimony.create');
        Route::get('patrimonios/{patrimony}/editar', [PatrimonyController::class, 'edit'])->name('patrimony.edit');
        Route::post('patrimonios', [PatrimonyController::class, 'store'])->name('patrimony.store');
        Route::put('patrimonios/{patrimony}/update', [PatrimonyController::class, 'update'])->name('patrimony.update');
        Route::delete('patrimonios/{patrimony}/destroy', [PatrimonyController::class, 'destroy'])->name('patrimony.destroy');

        Route::get('locais/criar', [PlaceController::class, 'create'])->name('place.create');
        Route::get('locais/{place}/editar', [PlaceController::class, 'edit'])->name('place.edit');
        Route::post('locais', [PlaceController::class, 'store'])->name('place.store');
        Route::put('locais/{place}/update', [PlaceController::class, 'update'])->name('place.update');
        Route::delete('locais/{place}/destroy', [PlaceController::class, 'destroy'])->name('place.destroy');

        Route::get('setores/criar', [SectorController::class, 'create'])->name('sector.create');
        Route::get('setores/{sector}/editar', [SectorController::class, 'edit'])->name('sector.edit');
        Route::post('setores', [SectorController::class, 'store'])->name('sector.store');
        Route::put('setores/{sector}/update', [SectorController::class, 'update'])->name('sector.update');
        Route::delete('setores/{sector}/destroy', [SectorController::class, 'destroy'])->name('sector.destroy');
        
        Route::get('componentes/criar', [ComponentController::class, 'create'])->name('component.create');
        Route::get('componentes/{component}/editar', [ComponentController::class, 'edit'])->name('component.edit');
        Route::post('componentes', [ComponentController::class, 'store'])->name('component.store');
        Route::put('componentes/{component}/update', [ComponentController::class, 'update'])->name('component.update');
        Route::delete('componentes/{component}/destroy', [ComponentController::class, 'destroy'])->name('component.destroy');

        Route::get('modelos/criar', [TypeController::class, 'create'])->name('type.create');
        Route::get('modelos/{type}/editar', [TypeController::class, 'edit'])->name('type.edit');
        Route::post('modelos', [TypeController::class, 'store'])->name('type.store');
        Route::put('modelos/{type}/update', [TypeController::class, 'update'])->name('type.update');
        Route::delete('modelos/{type}/destroy', [TypeController::class, 'destroy'])->name('type.destroy');

        Route::get('usuarios', [UserController::class, 'index'])->name('user.index');
        Route::get('usuarios/criar', [UserController::class, 'create'])->name('user.create');
        Route::get('usuarios/{user}/editar', [UserController::class, 'edit'])->name('user.edit');
        Route::post('usuarios', [UserController::class, 'store'])->name('user.store');
        Route::put('usuarios/{user}/update', [UserController::class, 'update'])->name('user.update');
        Route::delete('usuarios/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::middleware('user.commom')->group(function(){
        Route::get('usuario', [CommomUserController::class, 'edit'])->name('commom.user.edit');
        Route::put('usuario', [CommomUserController::class, 'update'])->name('commom.user.update');        
    });

});

