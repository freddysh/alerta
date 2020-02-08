<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    //
    protected $table='planta';

    public function sistemas()
    {
        return $this->hasMany(Sistema::class, 'planta_id');
    }
}
