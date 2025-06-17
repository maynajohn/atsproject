<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\ConvocationController;
use App\Http\Controllers\OffreEmploiController;
use App\Http\Controllers\CandidatureEntrepriseController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Routes Utilisateur
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/delete/{user}', [UserController::class, 'destroy'])->name('user.delete');

// Routes Candidat
Route::get('/candidat', [CandidatController::class, 'index'])->name('candidat.index');
Route::get('/candidat/create', [CandidatController::class, 'create'])->name('candidat.create');
Route::post('/candidat/store', [CandidatController::class, 'store'])->name('candidat.store');
Route::get('/candidat/edit/{candidat}', [CandidatController::class, 'edit'])->name('candidat.edit');
Route::post('/candidat/update/{candidat}', [CandidatController::class, 'update'])->name('candidat.update');
Route::delete('/candidat/delete/{candidat}', [CandidatController::class, 'destroy'])->name('candidat.delete');

// Routes Entreprise
Route::get('/entreprise', [EntrepriseController::class, 'index'])->name('entreprise.index');
Route::get('/entreprise/create', [EntrepriseController::class, 'create'])->name('entreprise.create');
Route::post('/entreprise/store', [EntrepriseController::class, 'store'])->name('entreprise.store');
Route::get('/entreprise/edit/{entreprise}', [EntrepriseController::class, 'edit'])->name('entreprise.edit');
Route::post('/entreprise/update/{entreprise}', [EntrepriseController::class, 'update'])->name('entreprise.update');
Route::delete('/entreprise/delete/{entreprise}', [EntrepriseController::class, 'destroy'])->name('entreprise.delete');
Route::resource('entreprise', EntrepriseController::class);

// Routes Offre d'emploi
Route::get('/offre', [OffreEmploiController::class, 'index'])->name('offre.index');
Route::get('/offre/create', [OffreEmploiController::class, 'create'])->name('offre.create');
Route::post('/offre/store', [OffreEmploiController::class, 'store'])->name('offre.store');
Route::get('/offre/edit/{offre}', [OffreEmploiController::class, 'edit'])->name('offre.edit');
Route::post('/offre/update/{offre}', [OffreEmploiController::class, 'update'])->name('offre.update');
Route::delete('/offre/delete/{offre}', [OffreEmploiController::class, 'destroy'])->name('offre.delete');
Route::resource('offre', OffreEmploiController::class);
Route::get('/offres-publiees', [OffreEmploiController::class, 'publie'])->name('offre.publie');

// Routes Candidature
Route::get('/candidature', [CandidatureController::class, 'index'])->name('candidature.index');
Route::get('/candidature/create/{offre}', [CandidatureController::class, 'create'])->name('candidature.create');
Route::post('/candidature/store', [CandidatureController::class, 'store'])->name('candidature.store');
Route::get('/candidature/edit/{candidature}', [CandidatureController::class, 'edit'])->name('candidature.edit');
Route::post('/candidature/update/{candidature}', [CandidatureController::class, 'update'])->name('candidature.update');
Route::delete('/candidature/delete/{candidature}', [CandidatureController::class, 'destroy'])->name('candidature.delete');

// Routes candidature-entreprise
Route::prefix('candidature-entreprise')->name('candidature-entreprise.')->group(function () {
    Route::get('/', [CandidatureEntrepriseController::class, 'index'])->name('index');
    Route::get('/create', [CandidatureEntrepriseController::class, 'create'])->name('create');
    Route::post('/store', [CandidatureEntrepriseController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CandidatureEntrepriseController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [CandidatureEntrepriseController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [CandidatureEntrepriseController::class, 'destroy'])->name('delete');
});

// Routes Convocation
Route::get('/convocation', [ConvocationController::class, 'index'])->name('convocation.index');
Route::get('/convocation/create', [ConvocationController::class, 'create'])->name('convocation.create');
Route::post('/convocation/store', [ConvocationController::class, 'store'])->name('convocation.store');
Route::get('/convocation/edit/{convocation}', [ConvocationController::class, 'edit'])->name('convocation.edit');
Route::post('/convocation/update/{convocation}', [ConvocationController::class, 'update'])->name('convocation.update');
Route::delete('/convocation/delete/{convocation}', [ConvocationController::class, 'destroy'])->name('convocation.delete');