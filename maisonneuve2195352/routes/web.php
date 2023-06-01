<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


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

// vers l'accueil
Route::get('/', [StudentController::class, 'index'])->name('maisonneuve.index');

// vers la page du profil d'un.e étudiant.e
Route::get('student/{student}', [StudentController::class, 'show'])->name('maisonneuve.show');

// vers la page de modification d'un profil d'un.e étudiant.e
Route::get('student-edit/{student}', [StudentController::class, 'edit'])->name('maisonneuve.edit');
Route::post('student-edit/{student}', [StudentController::class, 'store']);
Route::put('student-edit/{student}', [StudentController::class, 'update']);

// vers la création d'un profil d'un.e étudiant.e
Route::get('student-create', [StudentController::class, 'create'])->name('maisonneuve.create');
Route::post('student-create', [StudentController::class, 'store']);

// suppression d'un profil d'un.e étudiant.e
Route::delete('student/{student}', [StudentController::class, 'destroy']);