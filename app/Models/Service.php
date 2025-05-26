<?php

namespace App\Models;
use App\Models\Term;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
    'naziv',
    'opis',
    'cena',

    ];


    public function terms()
    {
        return $this->hasMany(Term::class, 'services_id');
    }
}
