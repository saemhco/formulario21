<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    protected $fillable = [
        'personal_id','dia','hora','turno','estado'
    ];

    public function personal() {
        return $this->belongsto(Personal::class);
    }
}
