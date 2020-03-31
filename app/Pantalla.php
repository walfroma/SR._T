<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pantalla extends Model
{
    protected $table = 'pantallas';

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
    protected $fillable = ['Pantalla', 'id'];
}
