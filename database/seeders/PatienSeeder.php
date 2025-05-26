<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patien;

class PatienSeeder extends Seeder
{
    public function run(): void
    {
        Patien::create([
            'ime' => 'Marko',
            'prezime' => 'Marković',
            'telefon' => '0611234567',
            'email' => 'marko@gmail.com',
        ]);
        Patien::create([
            'ime' => 'Jelena',
            'prezime' => 'Jelić',
            'telefon' => '0629876543',
            'email' => 'jelena@gmail.com',
        ]);
        Patien::create([
            'ime' => 'Nikola',
            'prezime' => 'Petrović',
            'telefon' => '0634567890',
            'email' => 'nikola@gmail.com',
        ]);
        Patien::create([
            'ime' => 'Ana',
            'prezime' => 'Stanić',
            'telefon' => '0642345678',
            'email' => 'ana@gmail.com',
        ]);
    }
}
