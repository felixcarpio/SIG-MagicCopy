<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use App\Http\Services\BitacoraService;

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
		$desde = session('desdepass');
		echo($desde);
		return view('reportes.estrategicos.ganancias')->with(compact('fecha','pdf'));
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
    	$desdepass = $this->global_desde;
    	$this->bitacora_service->bitacoraPost("Preview generado de ganancias generadas");
    	return redirect()->route('ganancias.preview')->with(compact('success','fecha','pdf','desdepass'));
    }
}
