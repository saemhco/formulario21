<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    protected $fillable = [
        'personal_id','op1','op2','op3','comentario'
    ];

    public function personal() {
        return $this->belongsto(Personal::class);
    }
}
