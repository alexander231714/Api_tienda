<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'idproducto';
    protected $fillable = [
        'idcategoria',
        'idproveedor',
        'nombre_producto',
        'precio',
        'stock',
        'descripcion',
        'imagen',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idcategoria');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'idproveedor');
    }
}