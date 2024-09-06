<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\Movementtype;
use Illuminate\Http\Request;

class MovementtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movementtype = Movementtype::orderBy('name','asc')->get();
        return response()->json($movementtype);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $movementtype = new Movementtype();
            $movementtype-> name = $request->name;
            $movementtype-> description = $request->description;
            $movementtype-> status = $request->status;
            $movementtype-> save();

            return response()->json(['status'=>true, 'message'=>'El tipo de movimiento '.$movementtype->name.'fue creado correctamente']);

        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al crear el tipo de movimiento: ']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movementtype = Movementtype::find($id);
        return response()->json($movementtype);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{

            $movementtype = Movementtype::findOrFail($id);
            $movementtype-> name = $request->name;
            $movementtype-> description = $request->description;
            $movementtype-> status = $request->status;
            $movementtype-> save();

            return response()->json(['status'=>true, 'message'=>'El tipo de movimiento '.$movementtype->name.'fue actualizado correctamente']);

        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al actualizar el tipo de movimiento: ']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $movementtype = Movementtype::findOrFail($id);
            $movementtype->delete();
            return response()->json(['status'=>true, 'message'=>'El tipo de movimiento '.$movementtype->name.'fue eliminada correctamente']);

        }catch (\Exception $exc) {
            return response()->json(['status'=>false, 'message'=>'Error al eliminar el tipo de movimiento: ']);
        }
    }
}
