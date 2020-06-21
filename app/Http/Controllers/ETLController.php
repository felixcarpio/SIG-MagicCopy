<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Marquine\Etl\Etl;
use Artisan;
use App\Http\Services\BitacoraService;
class ETLController extends Controller
{
	private $bitacora_service;

    public function __construct(BitacoraService $bitacora_service)
    {
        $this->bitacora_service = $bitacora_service;
    }
	
	public function etl(){
		//var_dump("entro a metodo de controller etl");
		Artisan::call('etl:auto');
	//	var_dump("return a metodo de controller etl");
		$arr = explode('|', Artisan::output());
	//	var_dump($arr);
		$msg = $arr[0];
		$status =(Int) $arr[1];
		$this->bitacora_service->bitacoraPost("ETL ejecutado de forma manual");
		return response()->json(array('msg'=> $msg), $status);
	}

}
