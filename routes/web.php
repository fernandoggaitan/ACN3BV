<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('prueba', function(){
    return 'Hola, soy una página de prueba';
});

//Gestor de cursos.

//Método index
Route::get('cursos', [
    CursoController::class,
    'index'
])->name('cursos.index');

//Método create
Route::get('cursos/create', [
    CursoController::class,
    'create'
])->name('cursos.create');

//Método store
Route::post('cursos', [
    CursoController::class,
    'store'
])->name('cursos.store');

//Método show.
Route::get('cursos/{curso}', [
    CursoController::class,
    'show'
])->name('cursos.show');

//Método edit.
Route::get('cursos/{curso}/edit', [
    CursoController::class,
    'edit'
])->name('cursos.edit');

//Método update.
Route::put('cursos/{curso}', [
    CursoController::class,
    'update'
])->name('cursos.update');

//Método destroy.
Route::delete('cursos/{curso}', [
    CursoController::class,
    'destroy'
])->name('cursos.destroy');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
