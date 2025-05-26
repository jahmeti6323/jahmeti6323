<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $table = 'terms';

    protected $fillable = [
        'pacijent_id',
        'doktor_id',
        'usluga_id',
        'vreme',
    ];

   
    public function patien()
    {
        return $this->belongsTo(Patien::class, 'pacijent_id');
    }


    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doktor_id');
    }


    public function service()
    {
        return $this->belongsTo(Service::class, 'usluga_id');
    }
}
