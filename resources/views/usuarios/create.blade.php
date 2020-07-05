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
                                <input type="text" name="username" placeholder="Nombre de Usuario" required pattern="^[a-zA-Z0-9áéíóúñ]{3,15}$" title="El usuario se debe componer de letras y numeros con 8 caracteres minimo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" placeholder="Ingresar Nombre" required pattern="^[a-zA-Záéíóúñ\s]{2,50}$" title="El nombre debe contener solamente letras" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="surname">Apellido</label>
                                <input type="text" name="surname" placeholder="Ingresar Apellido" required pattern="^[a-zA-Záéíóúñ\s]{2,50}$" title="El apellido debe contener solamente letras" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input type="email" name="email" placeholder="Ingresar el correo" required pattern="[a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{1,5}" title="El correo puede contener letras, números y los caracteres (. _ -)" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" placeholder="Ingresar contraseña" required pattern="^[a-zA-Z0-9_áéíóúñ]{8,15}$" title="La contraseá puede contener letras, números, tamaño minimo: 8 caracteres" class="form-control">
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
                                <a href="{{ route('usuarios.index')}}" class="btn btn-default">Cancelar</a>
                            </div>
                        </form><center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection