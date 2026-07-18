<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    public function refacciones() {
    return $this->hasMany(LineaRefaccion::class);
}
}
