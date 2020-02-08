<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    //
    protected $table='sistema';
    public function planta()
    {
        return $this->belongsTo(Planta::class, 'planta_id');
    }
    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'sistema_id');
    }
}
