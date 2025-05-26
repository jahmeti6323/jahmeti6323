<?php


namespace App\Models;
use App\Models\Term;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';

    protected $fillable = [
        'ime',
        'prezime',
        'telefon',
        'email',
        'specijalizacija'
    ];


    public function terms()
    {
        return $this->hasMany(Term::class, 'doctors_id');
    }
}
