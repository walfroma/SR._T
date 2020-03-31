<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bateria extends Model
{
    protected $table = 'baterias';

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
    protected $fillable = ['Bateria', 'id'];
}


