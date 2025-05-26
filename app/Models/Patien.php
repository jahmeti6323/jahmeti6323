<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Term;

class Patien extends Model
{
    protected $table = 'patiens';

    protected $fillable = [
        'ime',
        'prezime',
        'telefon',
        'email',
    ];

    public function terms()
    {
        return $this->hasMany(Term::class, 'pacijent_id'); 
    }
}
