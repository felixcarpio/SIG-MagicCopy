<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Productos;
use App\ProductosPedidos;
use App\Pedidos;
use App\Detalles;
use App\Salidas;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class ComparativaController extends Controller
{
    //
    public function cargar()
    {
        $productos = DB::table('tbl_producto')
            ->select('nombre')
            ->get();
        $fecha = '';
        $pdf = 0;
        $fechaini = '';
        $fechafin = '';
        return view('reportes.estrategicos.compararGanancia',compact('fecha','pdf','fechaini','fechafin',
                        'productos'));
    }

    public function comparativaPreview()
    {
        $fecha = session('fecha');
        $pdf = session('pdf');
        $fechaini = session('fechaini');
        $fechafin = session('fechafin');
        $datos = session('datos');
        $fechaventa = $datos[0];
        $preciounitario = $datos[1];
        $unidades = $datos[2];
        $subtotal = $datos[3];
        $descuento = $datos[4];
        $total = $datos[5];

        return view('reportes.estrategicos.compararGanancia')->with(compact('fecha','pdf','fechaini',
        'fechafin','fechaventa','preciounitario','unidades','subtotal','descuento','total'));
    }

    public function comp(Request $request)
    {
        $this->validate($request,[
            'fechaini' => 'required',
            'fechafin' => 'required | after_or_equal:fechaini',
            'producto' => 'required'
        ]);

        $fechaini = $request->input('fechaini');
        $fechafin = $request->input('fechafin');
        $producto = $request->input('producto');

        if($fechaini > $fechafin){
            $fechaini='';
            $fechafin='';
            return redirect()->route('compararGanancia.pantalla')->withErrors(['La fecha inicial es mayor 
                        que la fecha final.']);
        }

        $fecha = Carbon::parse(Carbon::now())->format('d/m/Y');
        $success = 'Comparación generada';
        $pdf = 1;
        $datos = $this->generarComparativa($fechaini,$fechafin,$producto);
        $fechaventa = $datos[0];
        $preciounitario = $datos[1];
        $unidades = $datos[2];
        $subtotal = $datos[3];
        $descuento = $datos[4];
        $total = $datos[5];

        return view('reportes.estrategicos.compararGanancia')->with(compact('fecha','pdf','fechaini',
                    'fechafin','fechaventa','preciounitario','unidades','subtotal','descuento','total'));
    }

    public function generarComparativa($fechaini,$fechafin,$producto)
    {
        $datos = array();
        $ventas = DB::table('tbl_salida')
        ->join('tbl_detalle','tbl_salida.id','tbl_detalle.salida_id')
        ->join('tbl_pedido','tbl_pedido.id','tbl_detalle.pedido_id')
        ->join('tbl_producto_pedido','tbl_producto_pedido.producto_id','tbl_pedido.id')
        ->join('tbl_producto','tbl_producto.id','tbl_producto_pedido.producto_id')
        ->select('tbl_salida.fecha_emision','tbl_producto_pedido AS preciounitario',
        'tbl_detalle.cantidad_vendida AS unidades','tbl_detalle.total_detalle AS subtotal',
        'tbl_detalle.total_con_desc AS descuento','tbl_salida.total_iva')
        ->where('tbl_producto.nombre',$producto)
        ->where('tbl_salida.fecha_emision',[$fechaini,$fechafin])
        ->get()->toArray();
        //dd($ventas);
        return $datos;
    }
}
