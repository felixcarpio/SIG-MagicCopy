<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function usuarios(){
    	return view('usuarios.index',['usuarios'=>User::orderBy('id','ASC')->get()]);
    }
}
