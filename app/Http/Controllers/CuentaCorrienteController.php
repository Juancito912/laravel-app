<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentaCorriente;

class CuentaCorrienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $cuentas = CuentaCorriente::all();
        return $cuentas;
    }
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $cuenta = new CuentaCorriente();
        $cuenta->poseedor=$request->poseedor;
        $cuenta->saldo=$request->saldo;
        $cuenta->banco_id=$request->banco_id;
        $cuenta->proveedor_id=$request->proveedor_id;
        $cuenta->save();
    }
    public function update(Request $request, CuentaCorriente $cuenta)
    {
        if (!$request->ajax()) return redirect('/');
        $cuenta = CuentaCorriente::find($cuenta->id);
        $cuenta->poseedor=$request->poseedor;
        $cuenta->saldo=$request->saldo;
        $cuenta->banco_id=$request->banco_id;
        $cuenta->proveedor_id=$request->proveedor_id;
        $cuenta->save();
    }
    public function show(CuentaCorriente $cuenta,Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $cuenta = CuentaCorriente::find($cuenta->id);
        return $cuenta;
    }
    public function showProveedor(Request $request,CuentaCorriente $cuenta)
    {
        if(!$request->ajax()) return redirect('/');
        $cuentas = CuentaCorriente::where('proveedor_id','=','3')->get();
        return $cuentas;
    }
    public function destroy(CuentaCorriente $cuenta)
    {
        if (!$request->ajax()) return redirect('/');
        $cuenta = CuentaCorriente::find($cuenta->id);
        $cuenta->delete();
    }
}
