<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['categoria', 'proveedor'])->get();
        return response()->json($productos);
    }

    public function show($id)
    {
        $producto = Producto::with(['categoria', 'proveedor'])->findOrFail($id);
        return response()->json($producto);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'idcategoria' => 'required|exists:categorias,idcategoria',
            'idproveedor' => 'required|exists:proveedores,idproveedor',
            'nombre_producto' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]);

        $producto = Producto::create($request->all());
        return response()->json($producto, 201);
    }

    public function update(Request $request, $idproducto)
    {
        $this->validate($request, [
            'idcategoria' => 'required|exists:categorias,idcategoria',
            'idproveedor' => 'required|exists:proveedores,idproveedor',
            'nombre_producto' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]);

        $producto = Producto::findOrFail($idproducto);
        $producto->update($request->all());
        return response()->json($producto, 200);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return response()->json(null, 204);
    }
}
