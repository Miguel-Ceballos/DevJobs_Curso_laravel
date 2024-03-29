<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
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

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [ VacancyController::class, 'index' ])->middleware([ 'auth', 'verified', 'rol.recruiter' ])->name('vacancies.index');
Route::get('/vacancies/create', [ VacancyController::class, 'create' ])->middleware([ 'auth', 'verified' ])->name('vacancies.create');
Route::get('/vacancies/{vacancy}/edit', [ VacancyController::class, 'edit' ])->middleware([ 'auth', 'verified' ])->name('vacancies.edit');
Route::get('/vacancies/{vacancy}', [ VacancyController::class, 'show' ])->name('vacancies.show');

Route::get('/candidates/{vacancy}', [ CandidateController::class, 'index' ])->name('candidate.index');

Route::get('notifications', \App\Http\Controllers\NotificationController::class)->middleware([ 'auth', 'verified', 'rol.recruiter' ])->name('notifications');

Route::middleware('auth')->group(function() {
    Route::get('/profile', [ ProfileController::class, 'edit' ])->name('profile.edit');
    Route::patch('/profile', [ ProfileController::class, 'update' ])->name('profile.update');
    Route::delete('/profile', [ ProfileController::class, 'destroy' ])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
