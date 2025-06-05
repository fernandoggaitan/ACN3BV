<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('prueba', function(){
    return 'Hola, soy una página de prueba';
});

//Gestor de cursos.
Route::resource(
    'cursos', 
    CursoController::class)->except(['show']
)->middleware(['auth', 'verified', 'is_admin']);

Route::resource('comments', CommentController::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('tasks', 'tasks.tasks')
    ->middleware(['auth', 'verified'])
    ->name('tasks');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
