<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Salidas;
use App\ProductosPedidos;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use App\Http\Services\BitacoraService;
use Illuminate\Support\Facades\DB;
class GananciasController extends Controller
{

	private $bitacora_service;

    public function __construct(BitacoraService $bitacora_service)
    {
        $this->bitacora_service = $bitacora_service;
    }
    
	public function gananciasPreview(){
		$fecha = session('fecha');
		$pdf = session('pdf');
		$desde = session('desde');
		$hasta = session('hasta');
		$datos = session('datos');
		$egreso = $datos[0];
		$ingreso = $datos[1];
		$total = $datos[2];

		//echo($desde);
		return view('reportes.estrategicos.ganancias')->with(compact('fecha','pdf','desde','hasta','egreso','ingreso','total'));
	}

    public function ganancias(Request $request){
    	$request->validate([
    		'Desde' => 'required',
    		'Hasta' => 'required'
    	]);

        $desde = $request->Desde;
        $hasta = $request->Hasta;

    	if($desde > $hasta){
            $desde='';
            $hasta='';
    		return redirect()->route('ganancias.pantalla')->withErrors(['La fecha inicial es mayor que la fecha final!!']);
    	}
    	$fecha = Carbon::parse(Carbon::now())->format('d/m/Y');
    	$success = 'Preview generado.';
    	$pdf = 1;
    	$datos = $this->ingresoEgresos($desde,$hasta);
        $egreso = $datos[0];
        $ingreso = $datos[1];
        $total = $datos[2];
        //return var_dump($datos);
    	$this->bitacora_service->bitacoraPost("Preview generado de informe de anancias generadas");
    	//return redirect()->route('ganancias.preview')->with(compact('success','fecha','pdf','desde','hasta','datos'));
        return view('reportes.estrategicos.ganancias')->with(compact('fecha','pdf','desde','hasta','egreso','ingreso','total'));
    }

    public function ingresoEgresos($desde,$hasta){
    	$datos = array();
        $totalSalida = 0;
        $totalPedidos = 0;
        $total = 0;
        $salidas = Salidas::whereBetween('fecha_emision',[$desde,$hasta])->get();
        $pedidos = ProductosPedidos::whereBetween('fecha_recibido',[$desde,$hasta])->get();

        foreach ($salidas as $salida) {
            $totalSalida = $totalSalida + $salida->total;
        }

        foreach ($pedidos as $pedido) {
           $totalPedidos = $totalPedidos +($pedido->cantidad_ordenada*$pedido->costo_unitario);
        }

        $total = $totalSalida - $totalPedidos;
        $datos[0] = $totalPedidos;$datos[1]=$totalSalida;$datos[2]=$total;

    	return $datos;
    }

    public function gananciasPDF($desde,$hasta){
        //return var_dump($global_desde);
        //$desde= $this->global_desde;
       // $hasta = $this->global_hasta;
        $datos = $this->ingresoEgresos($desde,$hasta);
        //return var_dump($datos);
        $egreso = $datos[0];
        $ingreso = $datos[1];
        $total = $datos[2];
        $fecha = Carbon::parse(Carbon::now())->format('d/m/Y');
        $desde = Carbon::parse($desde)->format('d/m/Y');
        $hasta = Carbon::parse($hasta)->format('d/m/Y');
        $pdf = PDF::loadView('reportes.estrategicos.pdf.gananciasPDF',compact('ingreso','egreso','total','fecha','desde','hasta'));
        //Llamando servicio de bitacora para crear registro
        $this->bitacora_service->bitacoraPost("PDF generado de informe de ganancias generadas");
        return $pdf->download('ganancias-generadas.pdf');
    }


}
