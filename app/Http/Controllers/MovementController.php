<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movement = Movement::orderBy('detail','asc')->get();
        return response()->json($movement);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $movement = new Movement();
            $movement-> detail = $request->detail;
            $movement-> date = $request->date;
            $movement-> user_id = $request->user_id;
            $movement->account_id = $request->account_id;
            $movement->categorie_id = $request->categorie_id;
            $movement->movementtype_id = $request->movementtype_id;
            $movement->status = $request->status;
            $movement->coin_id = $request->coin_id;
            $movement->amount = $request->amount;

            $movement-> save();

            $image_name =$this->loadImage($request);
            if($image_name != ''){
                $movement->image()->create(['url'=>'images/'.$image_name]);
            }

            return response()->json(['status'=>true, 'message'=>'El movimiento '.$movement->detail.'fue creado correctamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al crear el movimiento: ']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $moviment = Movement::find($id);

        $image = null;
        if($moviment->image){
            $image = Storage::url($moviment->image['url']);
        }

        return response()->json(['moviment'=>$moviment, 'image'=>$image]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{

            $movement = Movement::findOrFail($id);
            $movement-> detail = $request->detail;
            $movement-> date = $request->date;
            $movement-> user_id = $request->user_id;
            $movement->account_id = $request->account_id;
            $movement->categorie_id = $request->categorie_id;
            $movement->movementtype_id = $request->movementtype_id;
            $movement->status = $request->status;
            $movement->coin_id = $request->coin_id;
            $movement->amount = $request->amount;

            $movement-> save();

            $image_name =$this->loadImage($request);
            if($image_name != ''){
                $movement->image()->create(['url'=>'images/'.$image_name]);
            }

            return response()->json(['status'=>true, 'message'=>'El movimiento '.$movement->detail.'fue actualizado correctamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al actualizar el movimiento: ']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $moviment = Movement::findOrFail($id);
            $moviment->delete();

            return response()->json(['status'=>true, 'message'=>'El movimiento '.$moviment->name. ' fue eliminado exitosamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al eliminar el movimiento'.$exc]);
        }
    }



    public function loadImage($request){
        $image_name = '';
        if($request->hasFile('image')){
            $destination_patch = 'public/images';
            $image = $request->file('image');
            $image_name = time() . '_' . $image->getClientOriginalName();
            $request->file('image')->storeAs($destination_patch, $image_name);
        }
        return $image_name;
    }
}
