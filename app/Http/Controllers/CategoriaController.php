<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        return Categoria::all();
    }

    public function show($id)
    {
        return Categoria::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Categoria::create($request->all());
    }

    public function update(Request $request, $idcategoria)
    {
        try {
            $categoria = Categoria::findOrFail($idcategoria);
            $categoria->update($request->all());
            return $categoria;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return 204;
    }
}
