<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Term;

class TermSeeder extends Seeder
{
    public function run(): void
    {
        Term::create([
            'pacijent_id' => 1,
            'doktor_id' => 1,
            'usluga_id' => 1,
            'vreme' => '2025-06-01 10:00:00',
        ]);
        Term::create([
            'pacijent_id' => 2,
            'doktor_id' => 2,
            'usluga_id' => 2,
            'vreme' => '2025-06-02 14:30:00',
        ]);
        Term::create([
            'pacijent_id' => 3,
            'doktor_id' => 3,
            'usluga_id' => 3,
            'vreme' => '2025-06-03 09:00:00',
        ]);
        Term::create([
            'pacijent_id' => 4,
            'doktor_id' => 4,
            'usluga_id' => 4,
            'vreme' => '2025-06-04 11:30:00',
        ]);
    }
}
