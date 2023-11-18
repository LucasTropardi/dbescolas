<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\UserController;
use App\Models\Escola;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'escolas' => Escola::all(),
        //
    ]);
})->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // users
    Route::get('/users-index',[UserController::class,'index'])
        ->name('user.index');
    Route::get('/user-edit/{id}',[UserController::class,'edit'])
        ->name('user.edit');
    Route::put('/edit-update/{id}',[UserController::class,'update'])
        ->name('user.update');

    // escolas, salas, alunos, ocorrencias, chamada, nota resources
    Route::resources([
        'escola' => EscolaController::class,
        'sala'   => SalaController::class,
        'aluno'  => AlunoController::class,
    ]);

    // minhas escolas
    Route::get('/minhas_escolas/{id}',[EscolaController::class, 'minhas_escolas'])
        ->name('minhas.escolas');

    // confirma delete escola
    Route::get('/confirma-delete/{id}',[EscolaController::class,'confirma_delete'])
        ->name('confirma.delete');

    // minhas salas
    Route::get('/minhas_salas/{id}',[SalaController::class, 'minhas_salas'])
        ->name('minhas.salas');

    // confirma delete sala
    Route::get('/confirma-delete-sala/{id}',[SalaController::class,'confirma_delete_sala'])
        ->name('confirma.delete.sala');

    // meus alunos
    Route::get('/meus_alunos/{id}',[AlunoController::class, 'meus_alunos'])
        ->name('meus.alunos');

    // confirma delete aluno
    Route::get('/confirma-delete-aluno/{id}',[AlunoController::class,'confirma_delete_aluno'])
        ->name('confirma.delete.aluno');
});

require __DIR__.'/auth.php';
