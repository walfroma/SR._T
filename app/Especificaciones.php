<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especificaciones extends Model
{
    protected $table = 'especificaciones';

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
    protected $fillable = ['Especificaciones', 'id'];
}
