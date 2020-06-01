<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Marquine\Etl\Etl;
use Artisan;
class ETLController extends Controller
{
	
	public function etl(){
		Artisan::call('etl:auto');
		$arr = explode('|', Artisan::output());
		$msg = $arr[0];
		$status =(Int) $arr[1];

		return response()->json(array('msg'=> $msg), $status);
	}

}
