<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'naziv' => 'Pregled i konsultacija',
            'opis' => 'Detaljan stomatološki pregled i savetovanje pacijenta.',
            'cena' => 1500,
        ]);
        Service::create([
            'naziv' => 'Vađenje zuba',
            'opis' => 'Bezbolno vađenje zuba sa kontrolom i savetima za oporavak.',
            'cena' => 4000,
        ]);
        Service::create([
            'naziv' => 'Ugradnja zubnog implanta',
            'opis' => 'Savetovanje i ugradnja implantata za zube.',
            'cena' => 12000,
        ]);
        Service::create([
            'naziv' => 'Profesionalno čišćenje zuba',
            'opis' => 'Uklanjanje kamenca i poliranje zuba.',
            'cena' => 3000,
        ]);
    }
}
