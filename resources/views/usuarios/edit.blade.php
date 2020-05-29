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
    <div class="conteiner">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                    <center><h1>Editar Usuario</h1><center><br></br>
                    </div>
                    <div class="card-body">
                    <center><form action="{{ route('usuarios.update',$usuario->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="username">Usuario</label>
                                <input type="text" name="username" required class="form-control" value="{{ $usuario->username}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" required class="form-control" value="{{ $usuario->name}}">
                            </div>
                            <div class="form-group">
                                <label for="surname">Apellido</label>
                                <input type="text" name="surname" required class="form-control" value="{{ $usuario->surname}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input type="email" name="email" required class="form-control" value="{{ $usuario->email}}">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="rol">Rol</label>
                                <select class="form-control" name="rol" >
                                    @foreach ($roles as $key => $value)
                                        @if ($usuario->hasRole($value))
                                            <option value="{{ $value }}" selected>{{$value}}</option>
                                        @else
                                            <option value="{{ $value }}" >{{$value}}</option>
                                        @endif
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