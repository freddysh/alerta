<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class componente extends Model
{
    //
    protected $table='componente';
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }
}
