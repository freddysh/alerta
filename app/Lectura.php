<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
    //
    protected $table='lectura';

    public function componente()
    {
        return $this->belongsTo(Componente::class, 'componente_id');
    }
}
