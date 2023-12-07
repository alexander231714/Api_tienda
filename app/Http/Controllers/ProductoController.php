<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        return Producto::with(['categoria', 'proveedor'])->get();
    }

    public function show($id)
    {
        return Producto::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Producto::create($request->all());
    }

    public function update(Request $request, $idproducto)
    {
        $producto = Producto::findOrFail($idproducto);
        $producto->update($request->all());
        return $producto;
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return 204;
    }
}
