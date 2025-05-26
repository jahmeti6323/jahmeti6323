<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::create([
            'ime' => 'Ana',
            'prezime' => 'Petrović',
            'specijalizacija' => 'Stomatologija',
        ]);

        Doctor::create([
            'ime' => 'Marko',
            'prezime' => 'Jovanović',
            'specijalizacija' => 'Oralna hirurgija',
        ]);

        Doctor::create([
            'ime' => 'Ivana',
            'prezime' => 'Nikolić',
            'specijalizacija' => 'Ortodontija',
        ]);

        Doctor::create([
            'ime' => 'Stefan',
            'prezime' => 'Milovanović',
            'specijalizacija' => 'Dečija stomatologija',
        ]);
    }
}
