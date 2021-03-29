<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personals';
    protected $fillable = [
        'dni','nombres','apellido_paterno','apellido_materno','email','img','reg_lab_id','tipo_id'
    ];

    public function tipo() {
        return $this->belongsto(Tipo::class);
    }
    public function reg_lab() {
        return $this->belongsto(RegLab::class);
    }
}
