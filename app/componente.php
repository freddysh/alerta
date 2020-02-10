<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    //
    protected $table='componente';
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }
    public function lecturas()
    {
        return $this->hasMany(Lectura::class, 'componente_id');
    }
}
