<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coin = Coin::orderBy('name','asc')->get();
        return response()->json($coin);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $coin = new Coin();
            $coin-> name = $request->name;
            $coin-> symbol = $request->symbol;
            $coin-> code = $request->code;
            $coin->country = $request->country;

            $coin-> save();

            return response()->json(['status'=>true, 'message'=>'La moneda '.$coin->name.'fue creado correctamente']);

        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al crear la moneda: ']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coin = Coin::find($id);
        return response()->json($coin);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{

            $coin = Coin::findOrFail($id);
            $coin-> name = $request->name;
            $coin-> symbol = $request->symbol;
            $coin-> code = $request->code;
            $coin->country = $request->country;

            $coin-> save();

            return response()->json(['status'=>true, 'message'=>'La moneda '.$coin->name.'fue actualizado correctamente']);

        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al actualizar la moneda: ']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $coin = Coin::findOrFail($id);
            $coin->delete();
            return response()->json(['status'=>true, 'message'=>'La moneda '.$coin->name.'fue eliminada correctamente']);

        }catch (\Exception $exc) {
            return response()->json(['status'=>false, 'message'=>'Error al eliminar la moneda: ']);
        }
    }
}
