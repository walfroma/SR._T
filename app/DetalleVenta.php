<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_ventas';

    protected $primaryKey= 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'factura_id',
        'Cantidad',
        'Precio',
        'productos_id'
    ];

    protected $guarded = [


    ];
}
