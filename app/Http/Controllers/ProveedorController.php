<?php

namespace App\Http\Controllers;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $proveedores = Proveedor::all();
        return $proveedores;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $proveedor=new Proveedor();
        $proveedor->nombre=$request->nombre;
        $proveedor->deuda=$request->deuda;
        $proveedor->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor,Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $proveedor = Proveedor::find($proveedor->id);
        return $proveedor;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        if (!$request->ajax()) return redirect('/');
        $proveedor = Proveedor::find($proveedor->id);
        $proveedor->nombre = $request->nombre;
        $proveedor->deuda = $request->deuda;
        $proveedor->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor,Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $proveedor = Proveedor::find($proveedor->id);
        $proveedor->delete();
        
    }
}
