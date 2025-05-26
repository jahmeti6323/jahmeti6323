<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Term;
use App\Models\Service;
use App\Models\Doctor;
use App\Models\Patien;

class TerminController extends Controller
{
    // Za korisnike: prikaz dostupnih usluga za zakazivanje termina
    public function index()
    {
        $usluge = Service::all();
        return view('mojeusluge', compact('usluge'));
    }

    // Za korisnike: zakazivanje termina
    public function store(Request $request)
    {
        $request->validate([
            'usluga_id' => 'required|exists:services,id',
            'vreme' => 'required|date|after:now',
        ]);

        Term::create([
            'pacijent_id' => Auth::id(),
            'doktor_id' => 1, // Privremeno statično, možeš dodati izbor kasnije
            'usluga_id' => $request->usluga_id,
            'vreme' => $request->vreme,
        ]);

        return redirect()->route('mojeusluge')->with('success', 'Termin uspešno zakazan!');
    }

    // --- ADMIN CRUD ---

    // Prikaz svih termina za admina
    public function adminIndex()
    {
        $terms = Term::with(['doctor', 'service'])->get();
        return view('lista_usluga', compact('terms'));
    }

    // Forma za dodavanje termina (admin)
    public function create()
    {
        if (!Auth::check() || Auth::user()->role->name !== 'Admin') {
            abort(403);
        }

        $doctors = Doctor::all();
        $services = Service::all();
        $pacijenti = Patien::all();

        return view('terms-create', compact('doctors', 'services','pacijenti'));
    }

    // Čuvanje novog termina (admin)
    public function adminStore(Request $request)
    {
        if (!Auth::check() || Auth::user()->role->name !== 'Admin') {
            abort(403);
        }

        $request->validate([
            'pacijent_id' => 'required|exists:users,id',
            'doktor_id' => 'required|exists:doctors,id',
            'usluga_id' => 'required|exists:services,id',
            'vreme' => 'required|date|after_or_equal:today',
        ]);

        Term::create($request->all());

        return redirect()->route('lista_usluga')->with('success', 'Termin uspešno dodat.');
    }

    // Forma za izmenu termina
    public function edit($id)
    {
        if (!Auth::check() || Auth::user()->role->name !== 'Admin') {
            abort(403);
        }

        $term = Term::findOrFail($id);
        $doctors = Doctor::all();
        $services = Service::all();
        $pacijenti = Patien::all();

        return view('terms-edit', compact('term', 'doctors', 'services','pacijenti'));
    }

    // Ažuriranje termina
    public function update(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role->name !== 'Admin') {
            abort(403);
        }

        $request->validate([
            'usluga_id' => 'required|exists:services,id',
            'vreme' => 'required|date|after_or_equal:today',
        ]);

        $term = Term::findOrFail($id);
        $term->update($request->all());

        return redirect()->route('lista_usluga')->with('success', 'Termin uspešno izmenjen.');
    }

    // Brisanje termina
    public function destroy($id)
    {
        if (!Auth::check() || Auth::user()->role->name !== 'Admin') {
            abort(403);
        }

        $term = Term::findOrFail($id);
        $term->delete();

        return redirect()->route('lista_usluga')->with('success', 'Termin uspešno obrisan.');
    }
}
