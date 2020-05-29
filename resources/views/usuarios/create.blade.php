@extends('layout')
@section('titulo')
  Gestión de usuarios
@endsection
@section('nombrevista')
  Gestión de usuarios
@endsection
@section('opcionesmenu')

@endsection

@section('content')
    <div class="row">
	    <div class="span12">
		    <div class="info-box">
			    <div class="row-fluid stats-box">
				    <div class="span12">
                        <center><h1>Nuevo usuario</h1><center><br></br>
                    </div>
                    <div class="widget widget-table action-table"">
                    <center><form action="{{ url('usuarios')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="username">Usuario</label>
                                <input type="text" name="username" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="surname">Apellido</label>
                                <input type="text" name="surname" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input type="email" name="email" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="rol">Rol</label>
                                <select class="form-control" name="rol" >
                                    @foreach ($roles as $key => $value)
                                        <option value="{{ $value }}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="justify-content-end">
                                <input type="submit" value="Enviar" class="btn btn-success">
                            </div>
                        </form><center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection