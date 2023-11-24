<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [
        'idcategoria',
        'idproveedor',
        'nombre_producto',
        'precio',
        'stock',
        'descripcion',
        'imagen',
    ];
}
