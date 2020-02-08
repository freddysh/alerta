<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    //
    protected $table='equipo';
    public function sistema()
    {
        return $this->belongsTo(Sistema::class, 'sistema_id');
    }
}
