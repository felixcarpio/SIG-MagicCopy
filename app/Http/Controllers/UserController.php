<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create user'], ['only'=>['create','store']]);
        $this->middleware(['permission:read users'], ['only'=>'index']);
        $this->middleware(['permission:update user'], ['only'=>['edit','update']]);
        $this->middleware(['permission:delete user'], ['only'=>'delete']);
    }
    
    public function usuarios(){
    	return view('usuarios.index',['usuarios'=>User::orderBy('id','ASC')->get()]);
    }

    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(5);
        
        return view('usuarios.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::all()->pluck('name','id');
        return view('usuarios.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $usuario = new User;
        $usuario->username = $request->username;
        $usuario->name = $request->name;
        $usuario->surname = $request->surname;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);


        try{
            if($usuario->save()){
                //asignar el rol
                $usuario->assignRole($request->rol);
            }
            return Redirect::to("/usuarios")->with("success","Usuario guardado con éxito");
        } catch  (\Illuminate\Database\QueryException $e){
            return Redirect::to("/usuarios")->with("danger","No se pudo guardar, el correo o usuario ya existe");
        }
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $roles = Role::all()->pluck('name','id');
        return view('usuarios.edit',compact('usuario','roles'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->username = $request->username;
        $usuario->name = $request->name;
        $usuario->surname = $request->surname;
        $usuario->email = $request->email;
        if($request->password != null){
            $usuario->password = bcrypt($request->password);
        }
        
        try{
            if($usuario->save()){
                //asignar el rol
                $usuario->syncRoles($request->rol);
            }
            return Redirect::to("/usuarios")->with("success","Usuario actualizado con éxito");
        } catch  (\Illuminate\Database\QueryException $e){
            return Redirect::to("/usuarios")->with("danger","No se pudo actualizar, el correo o usuario ya existe");
        }
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        //Eliminar el rol
        $usuario->removeRole($usuario->roles->implode('name',','));
        //Eliminar usuario
        if($usuario->delete()){
            return redirect('/usuarios');
        }else{
            return response()->json([
                'mensaje' => 'Error al eliminar el usuario'
            ]);
        }
    }
}
