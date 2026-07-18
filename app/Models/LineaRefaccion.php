<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineaRefaccion extends Model
{
    public function linea() {
    return $this->belongsTo(Linea::class);
}
}
