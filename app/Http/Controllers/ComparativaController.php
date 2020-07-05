<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Salidas;

class ComparativaController extends Controller
{
    //
    public function comp(Request $request)
    {
        $this->validate($request,[
            'fechaini1' => 'required',
            'fechaini2' => 'required',
            'fechafin1' => 'required | after_or_equal:fechaini1',
            'fechafin2' => 'required | after_or_equal:fechaini2',
        ]);

        $fechaini1 = $request->input('fechaini1');
        $fechaini2 = $request->input('fechaini2');
        $fechafin1 = $request->input('fechafin1');
        $fechafin2 = $request->input('fechafin2');

        $monto1 = DB::table('tbl_salida')
            ->whereBetween('fecha_emision',[$fechaini1,$fechafin1])
            ->sum('total');
        $monto2 = DB::table('tbl_salida')
            ->whereBetween('fecha_emision',[$fechaini2,$fechafin2])
            ->sum('total');

        return view('reportes.estrategicos.mostrarComparativa',compact('monto1','monto2','fechaini1'
                ,'fechaini2','fechafin1','fechafin2'));
    }
}
