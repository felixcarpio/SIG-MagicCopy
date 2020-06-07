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
	protected $global_desde;
    protected $global_hasta;
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
    	$this->global_desde=$desde = Carbon::parse($request->Desde);
    	$this->global_hasta=$hasta = Carbon::parse($request->Hasta);
    	if($desde > $hasta){
    		return redirect()->back()->withErrors(['La fecha inicial es mayor que la fecha final!!']);
    	}
    	$fecha = Carbon::parse(Carbon::now())->format('d/m/Y');
    	$success = 'Product created successfully.';
    	$pdf = 1;
    	$datos = $this->ingresoEgresos($desde,$hasta);
    	$this->bitacora_service->bitacoraPost("Preview generado de ganancias generadas");
    	return redirect()->route('ganancias.preview')->with(compact('success','fecha','pdf','desde','hasta','datos'));
    }

    public function ingresoEgresos($desde,$hasta){
    	$datos = array();
    	//$salidas = Salidas::whereBetween('fecha_emision',[$desde,$hasta])->get();
       // $pedidos = ProductosPedidos::whereBetween('fecha_recibido',[$desde,$hasta])->get();
        $datos[1] = DB::table('salidas')->whereBetween('fecha_emision',[$desde,$hasta])->sum('total');
        $datos[0] = DB::select(DB::raw("select sum(costo_unitario*cantidad_ordenada) from tbl_producto_pedido where fecha_recibido BETWEEN desde and hasta"), array('desde'=>$desde,'hasta'=>$hasta));
    
    	$datos[2] = $datos[1] - $datos[0];
    	return $datos;
    }

    public function gananciasPDF(){
        $desde= $this->global_desde;
        $hasta = $this->global_hasta;
        $datos = $this->ingresoEgresos($desde,$hasta);
        $egreso = $datos[0];
        $ingreso = $datos[1];
        $total = $datos[2];
        $fecha = Carbon::parse(Carbon::now())->format('d/m/Y');
        $pdf = PDF::loadView('reportes.estrategicos.pdf.gananciasPDF',compact('ingreso','egreso','total','fecha','desde','hasta'));
        //Llamando servicio de bitacora para crear registro
        $this->bitacora_service->bitacoraPost("PDF generado de Informe de ganancias generadas");
        return $pdf->download('ganancias-generadas.pdf');
    }


}
