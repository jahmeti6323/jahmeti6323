<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Doctor;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    // Prikaz svih usluga
    public function index()
    {
        $services = Service::all();
        return view('usluge', compact('services'));
    }

    // Prikaz detalja jedne usluge
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('usluge', compact('service'));
    }

    // Prikaz forme za kreiranje nove usluge
    public function create()
    {
        return view('services-create');
    }

    // Čuvanje nove usluge u bazu
    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'cena' => 'required|numeric|min:0',
            'featured' => 'nullable|boolean',
        ]);

        Service::create([
            'naziv' => $request->naziv,
            'cena' => $request->cena,
            'featured' => $request->has('featured'),
        ]);

        return redirect()->route('lista_usluga')->with('success', 'Usluga je uspešno dodata.');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services-edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'cena' => 'required|numeric|min:0',
            'featured' => 'nullable|boolean',
        ]);

        $service = Service::findOrFail($id);
        $service->naziv = $request->naziv;
        $service->cena = $request->cena;
        $service->featured = $request->has('featured');
        $service->save();

        return redirect()->route('lista_usluga')->with('success', 'Usluga je uspešno izmenjena.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('lista_usluga')->with('success', 'Usluga je uspešno obrisana.');
    }

    public function lista()
    {
        $user = Auth::user();

        if ($user && $user->role && $user->role->name === 'User') {
            abort(403, 'Nemate dozvolu da pristupite ovoj stranici.');
        }

        $services = Service::all();
        $doctors = Doctor::all();
        $terms = Term::all();

        return view('lista_usluga', compact('services', 'doctors', 'terms'));
    }
}
