<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Marquine\Etl\Etl;
use Artisan;
use App\Http\Services\BitacoraService;
use App\Bitacora;
use Carbon\Carbon;
use Auth;
class ETLController extends Controller
{
	private $bitacora_service;

    public function __construct(BitacoraService $bitacora_service)
    {
        $this->bitacora_service = $bitacora_service;
    }
	
	public function etl(){
		Artisan::call('etl:auto');
		$arr = explode('|', Artisan::output());
		$msg = $arr[0];
		$status =(Int) $arr[1];
		$this->bitacora_service->bitacoraPost("ETL ejecutado de forma manual");
		return response()->json(array('msg'=> $msg), $status);
	}

}
