<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorie = Categorie::orderBy('name','asc')->get();
        return response()->json($categorie);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $categorie = new Categorie();
            $categorie-> name = $request->name;
            $categorie-> symbol = $request->symbol;
            $categorie-> status = $request->status;
            $categorie-> save();

            return response()->json(['status'=>true, 'message'=>'La categoria '.$categorie->name.'fue creado correctamente']);

        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al crear la categoria: ']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categorie = Categorie::find($id);
        return response()->json($categorie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{

            $categorie = Categorie::findOrFail($id);
            $categorie-> name = $request->name;
            $categorie-> symbol = $request->symbol;
            $categorie-> status = $request->status;
            $categorie-> save();

            return response()->json(['status'=>true, 'message'=>'La categoria '.$categorie->name.'fue actualizado correctamente']);

        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al actualizar la categoria: ']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $categorie = Categorie::findOrFail($id);
            $categorie->delete();
            return response()->json(['status'=>true, 'message'=>'La categoria '.$categorie->name.'fue eliminada correctamente']);

        }catch (\Exception $exc) {
            return response()->json(['status'=>false, 'message'=>'Error al eliminar la categoria: ']);
        }
    }
}
