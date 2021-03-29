<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegLab extends Model
{
    protected $table = 'reg_labs';
    protected $fillable = [
        'nombre','descripcion'
    ];
}
