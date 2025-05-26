<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Models\Term;
use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Route;

// Početna strana preko HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');

// Kontakt - napraviš da vodi na neki view ili metodu
Route::view('/kontakt', 'kontakt')->name('kontakt');
// ili ako hoćeš da imaš metodu u HomeController:
// Route::get('/kontakt', [HomeController::class, 'kontakt'])->name('kontakt');

Route::get('/usluge', [ServiceController::class, 'index'])->name('usluge.index');

Route::get('/usluge/{id}', [ServiceController::class, 'show'])->name('usluge.show');
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
         $termini = Term::select(
                FacadesDB::raw("DATE(vreme) as dan"),
                FacadesDB::raw("COUNT(*) as broj")
            )
            ->groupBy('dan')
            ->orderBy('dan', 'asc')
            ->get();


            $chartData = [];
            $chartData[] = ['Datum', 'Broj termina'];

            foreach ($termini as $termin) {
                $chartData[] = [$termin->dan, (int) $termin->broj];
            }
        return view('dashboard',compact('chartData'));
    })->middleware(['auth', 'verified'])->name('dashboard');
});



use App\Http\Controllers\TerminController;

Route::middleware('auth')->group(function () {
    Route::get('/moje/usluge', [TerminController::class, 'index'])->name('mojeusluge');
    Route::post('/zakazi', [TerminController::class, 'store'])->name('usluge.zakazi');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function() {
    Route::get('/admin/lista_usluga', [ServiceController::class, 'lista'])->name("lista_usluga");
});

Route::middleware('auth')->group(function () {
    Route::resource('services', ServiceController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('terms', TerminController::class);
});

Route::post('/services', [ServiceController::class, 'store'])->name('services.store');

// Za korisnike
Route::get('/mojeusluge', [TerminController::class, 'index'])->name('mojeusluge');
Route::post('/mojeusluge', [TerminController::class, 'store'])->name('zakazi.termin');

// Za admina
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/terms', [TerminController::class, 'adminIndex'])->name('admin.terms.index');
    Route::get('/terms/create', [TerminController::class, 'create'])->name('admin.terms.create');
    Route::post('/terms/store', [TerminController::class, 'adminStore'])->name('admin.terms.store');
    Route::get('/terms/{id}/edit', [TerminController::class, 'edit'])->name('admin.terms.edit');
    Route::put('/terms/{id}', [TerminController::class, 'update'])->name('admin.terms.update');
    Route::delete('/terms/{id}', [TerminController::class, 'destroy'])->name('admin.terms.destroy');
});


require __DIR__.'/auth.php';
