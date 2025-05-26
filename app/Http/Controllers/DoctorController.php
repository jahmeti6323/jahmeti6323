<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::all();
        return view('lista_usluga', compact('doctors'));
    }


    public function create()
    {
        if (!Auth::check() || !Auth::user()->role || Auth::user()->role->name !== 'Admin') {
            abort(403, 'Nemate dozvolu da pristupite ovoj stranici.');
        }

        return view('doctors-create');
    }


    public function store(Request $request)
    {
        if (!Auth::check() || !Auth::user()->role || Auth::user()->role->name !== 'Admin') {
            abort(403, 'Nemate dozvolu da izvršite ovu akciju.');
        }

        $request->validate([
            'ime' => 'required|string|max:255',
            'prezime' => 'required|string|max:255',
            'specijalizacija' => 'required|string|max:255',
        ]);

        Doctor::create($request->only('ime', 'prezime', 'specijalizacija'));

        return redirect()->route('lista_usluga')->with('success', 'Doktor je uspešno dodat.');
    }




    public function edit($id)
    {
        if (!Auth::check() || !Auth::user()->role || Auth::user()->role->name !== 'Admin') {
            abort(403, 'Nemate dozvolu za ovu akciju.');
        }

        $doctor = Doctor::findOrFail($id);
        return view('doctors-edit', compact('doctor'));
    }


    public function update(Request $request, $id)
    {
        if (!Auth::check() || !Auth::user()->role || Auth::user()->role->name !== 'Admin') {
            abort(403, 'Nemate dozvolu za ovu akciju.');
        }

        $request->validate([
            'ime' => 'required|string|max:255',
            'prezime' => 'required|string|max:255',
            'specijalizacija' => 'required|string|max:255',
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update($request->only('ime', 'prezime', 'specijalizacija'));

        return redirect()->route('lista_usluga')->with('success', 'Doktor je uspešno izmenjen.');
    }


    public function destroy($id)
    {
        if (!Auth::check() || !Auth::user()->role || Auth::user()->role->name !== 'Admin') {
            abort(403, 'Nemate dozvolu za ovu akciju.');
        }

        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('lista_usluga')->with('success', 'Doktor je uspešno obrisan.');
    }
}
