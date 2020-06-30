<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\ProductosPedidos;
use App\Productos;
use App\Pedidos;

class ProductosMasVendidosController extends Controller
{
    public function index(){
        
    }

    public function llenarTabla(Request $request){

        $desde = $request->Desde;
        $hasta = $request->Hasta;
        $pdf = 1;
        
        $id = $this->idproducto($desde,$hasta);
        $codigo = $this->codproducto($id);
        $nombre = $this->nomproducto($id);
        $cantidad = $this->cantproducto($id,$desde,$hasta);
        $total = $this->totalproducto($id,$desde,$hasta,$cantidad);
        //$ordencod = $this->ordencod($codigo,$cantidad);

        return view('reportes.tacticos.productosMasVendidos',compact('desde','hasta','id','pdf','codigo','nombre','cantidad','total'));
    }

    public function idproducto($desde,$hasta){
        $codprod = array();
        $i = 0;
        $productsped = ProductosPedidos::all();
        $pedido = Pedidos::whereBetween('fecha_solicitud',[$desde,$hasta])->get();

        foreach($pedido as $ped){
            foreach($productsped as $prodped){
                if($ped->codigo_pedido == $prodped->pedido_id){
                    $codprod[$i] = $prodped->producto_id;
                    $i++;
                }
            }
        }

        $codp = array_unique($codprod);
        return $codp;
    }

    public function codproducto($id){
        $codigo = array();
        $i=0;
        $producto = Productos::all();

        foreach($id as $i){
            $codigo[$i]=0;
            foreach($producto as $prod){
                if($i == $prod->id){
                    $codigo[$i] = $prod->codigo_producto;
                }
            }$i++;
        }

        return $codigo;
    }

    public function nomproducto($id){
        $nombre = array();
        $i=0;
        $producto = Productos::all();

        foreach($id as $i){
            $nombre[$i]=0;
            foreach($producto as $prod){
                if($i == $prod->id){
                    $nombre[$i] = $prod->nombre;
                }
            }$i++;
        }

        return $nombre;
    }
    
    public function cantproducto($id,$desde,$hasta){
        $canprod = array();
        $i = 0;
        $productsped = ProductosPedidos::all();
        $pedido = Pedidos::whereBetween('fecha_solicitud',[$desde,$hasta])->get();

        foreach($id as $i){
            $canprod[$i] = 0;
            foreach($pedido as $ped){
                foreach($productsped as $prodped){
                    if($ped->codigo_pedido == $prodped->pedido_id){
                        if($prodped->producto_id == $i){
                            $canprod[$i] = $canprod[$i] + $prodped->cantidad_ordenada; 
                        }
                    }
                }
            }$i++;
        }
        return $canprod;
    }

    public function totalproducto($id,$desde,$hasta,$cantidad){
        $total = array();
        $i = 0;
        $productsped = ProductosPedidos::all();
        $pedido = Pedidos::whereBetween('fecha_solicitud',[$desde,$hasta])->get();

        foreach($id as $i){
            $total[$i] = 0;
            foreach($pedido as $ped){
                foreach($productsped as $prodped){
                    if($ped->codigo_pedido == $prodped->pedido_id){
                        if($prodped->producto_id == $i){
                            $total[$i] = $cantidad[$i] * $prodped->costo_unitario; 
                        }
                    }
                }
            }$i++;
        }
        return $total;
    }
/*
    public function reportePdf(){
		$desde = $request->Desde;
        $hasta = $request->Hasta;
        
        $id = $this->idproducto($desde,$hasta);
        $codigo = $this->codproducto($id);
        $nombre = $this->nomproducto($id);
        $cantidad = $this->cantproducto($id,$desde,$hasta);
        $total = $this->totalproducto($id,$desde,$hasta,$cantidad);
		$fecha = Carbon::parse(Carbon::now())->format('d/m/Y');
		$pdf = PDF::loadView('reportes.tacticos.pdf.productosMasVendidosPDF',compact('desde','hasta','id','pdf','codigo','nombre','cantidad','total'));
		//Llamando servicio de bitacora para crear registro
		$this->bitacora_service->bitacoraPost("PDF generado de informe de productos actuales y existencia");
		return $pdf->download('productos-actuales.pdf');
	}*/

    /*public function ordencod($codigo,$cantidad){
        $z = sizeof($codigo);
        $cant = array(arsort($cantidad));
        $cod = array();
        for($a=0; $a<=$z; $a++){
            for($b=0; $b<=$z; $b++){
                if($cant[$a] == $cantidad[$b]){
                    $cod[$a] = $codigo[$b];
                }
            }
        }
        return $cod;
    }*/

}
