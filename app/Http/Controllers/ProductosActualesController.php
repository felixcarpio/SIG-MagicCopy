<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use App\Http\Services\BitacoraService;

class ProductosActualesController extends Controller
{

	private $bitacora_service;

    public function __construct(BitacoraService $bitacora_service)
    {
        $this->bitacora_service = $bitacora_service;
    }

	public function productosAll(){
		return Productos::orderBy('id','desc')->get();
	}

	public function productosCount($products){
		$total = 0;
		foreach($products as $product){
				$total = $total + $product->existencia_producto;
			}
		return $total;
		//return array_sum($products->existencia_producto);
	}

	public function productos(){

		$products = $this->productosAll();
		//return var_dump($products);
		$total = 0;
		// if(!empty($products)){
		// 	$total = $this->productosCount($products);
		// }else{
		// 	$products = '';
		// }
		$total = (!empty($products) ? $total = $this->productosCount($products) : $products = '');
		$pdf = 1;
		$fecha = Carbon::parse(Carbon::now())->format('d/m/Y');
		//Llamando servicio de bitacora para crear registro
		$this->bitacora_service->bitacoraPost("Preview generado de informe de productos actuales y existencia");
		return view('reportes.tacticos.productosActuales',compact('products','total','pdf','fecha'));
	}

	public function productosPdf(){
		$products = $this->productosAll();
		$total = 0;
		// if(!empty($products)){
		// 	$total = $this->productosCount($products);
		// }else{
		// 	$products = '';
		// }
		$total = (!empty($products) ? $total = $this->productosCount($products) : $products = '');
		$fecha = Carbon::parse(Carbon::now())->format('d/m/Y');
		$pdf = PDF::loadView('reportes.tacticos.pdf.productosActualesPDF',compact('products','total','fecha'));
		//Llamando servicio de bitacora para crear registro
		$this->bitacora_service->bitacoraPost("PDF generado de informe de productos actuales y existencia");
		return $pdf->download('productos-actuales.pdf');
	}

}
