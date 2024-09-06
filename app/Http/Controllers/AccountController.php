<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $account = Account::orderBy('name','asc')->get();
        return response()->json($account);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $account = new Account();
            $account->name = $request->name;
            $account->cuenta = $request->cuenta;
            $account->status = $request->status;
            $account->balance = $request->balance;
            $account->save();

            return response()->json(['status'=>true,'message'=>'La cuenta '.$account->name. 'fue creado correctamente']);
        } catch (Exception $exc) {
            return response()->json(['status'=>false,'message'=>'Error al crear la cuenta']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $account = Account::find($id);
        return response()->json($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       try{
        $account = Account::findOrFail($id);
        $account->name = $request->name;
        $account->cuenta = $request->cuenta;
        $account->status = $request->status;
        $account->balance = $request->balance;
        $account->save();

        return response()->json(['status'=>true, 'message'=>'La cuenta '.$account->name.' fue actualizado exitosamente' ]);
       }    catch (Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al actualizar la cuenta']);
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $account = Account::findOrFail($id);
            $account->delete();

            return response()->json(['status'=>true, 'message'=>'La cuenta '.$account->name. ' fue eliminada exitosamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al eliminar la cuenta'.$exc]);
        }
    }
}
