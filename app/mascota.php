<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mascota extends Model
{
    //
    protected $fillable = ['nombre', 'edad','especie','clasificacion','peso','paisorigen'];
}
