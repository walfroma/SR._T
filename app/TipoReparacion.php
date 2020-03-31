<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoReparacion extends Model
{
    protected $table = 'tipo_reparacions';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Descripcion', 'id'];
}
