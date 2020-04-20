<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'facturas';

    protected $primaryKey= 'id';

    public $timestamps = false;

    protected $fillable = [
        'users_id',
        'negocios_id',
        'Fecha',
        'Descuento',
        'Total'
    ];

    protected $guarded = [


    ];
}
