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
use App\Http\Services\BitacoraService;
use Carbon\Carbon;

class ComparativaController extends Controller
{
    //

    public function __construct(BitacoraService $bitacora_service)
    {
        $this->bitacora_service = $bitacora_service;
    }

    public function cargar()
    {
        $productos = DB::table('tbl_producto')
            ->select('nombre')
            ->get();
        $fecha = '';
        $pdf = 0;
        $fechaini = '';
        $fechafin = '';
        $datos = array();
        return view('reportes.estrategicos.compararGanancia',compact('fecha','pdf','fechaini','fechafin',
                        'productos','datos'));
    }

    public function comparativaPreview()
    {
        $productos = DB::table('tbl_producto')
            ->select('nombre')
            ->get();
        $fecha = session('fecha');
        $pdf = session('pdf');
        $fechaini = session('fechaini');
        $fechafin = session('fechafin');
        $datos = session('datos');

        return view('reportes.estrategicos.compararGanancia')->with(compact('fecha','pdf','fechaini',
        'fechafin','datos','productos'));
    }

    public function comp(Request $request)
    {
        $this->validate($request,[
            'fechaini' => 'required',
            'fechafin' => 'required | after_or_equal:fechaini',
            'producto' => 'required'
        ]);
        $productos = DB::table('tbl_producto')
            ->select('nombre')
            ->get();
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
        $this->bitacora_service->bitacoraPost("Preview generado de informe de comparación de ventas de producto");
        return view('reportes.estrategicos.compararGanancia')->with(compact('fecha','pdf','fechaini',
                    'fechafin','datos','productos'));
    }

    public function generarComparativa($fechaini,$fechafin,$producto)
    {
        $datos = array();
        $datos = DB::table('tbl_salida')
        ->join('tbl_detalle','tbl_salida.id','tbl_detalle.salida_id')
        ->join('tbl_pedido','tbl_pedido.id','tbl_detalle.pedido_id')
        ->join('tbl_producto_pedido','tbl_producto_pedido.producto_id','tbl_pedido.id')
        ->join('tbl_producto','tbl_producto.id','tbl_producto_pedido.producto_id')
        ->select('tbl_salida.fecha_emision','tbl_producto_pedido.costo_unitario AS preciounitario',
        'tbl_detalle.cantidad_vendida AS unidades','tbl_detalle.total_detalle AS subtotal',
        'tbl_detalle.total_con_desc AS descuento','tbl_salida.total_iva')
        ->where('tbl_producto.nombre',$producto)
        ->orwhere('tbl_salida.fecha_emision',[$fechaini,$fechafin])
        ->get()->toArray();
        return $datos;
    }
    
    public function comparativaPDF($fechaini,$fechafin,$producto){
        $datos = $this->generarComparativa($fechaini,$fechafin,$producto);
        //dd($producto);
        $fecha = Carbon::parse(Carbon::now())->format('d/m/Y');
        $fechaini = Carbon::parse($fechaini)->format('d/m/Y');
        $fechafin = Carbon::parse($fechafin)->format('d/m/Y');

        $pdf = PDF::loadView('reportes.estrategicos.pdf.comparativaPDF',compact('fecha',
        'fechaini','fechafin','datos','producto'));
        $this->bitacora_service->bitacoraPost("PDF generado de informe de comparación de ventas de producto");
        return $pdf->download('comparativa-generada.pdf');
    }
}
