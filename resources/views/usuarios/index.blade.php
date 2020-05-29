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
					<center><h3>Librería el Páramo</h3></center>
					<center><h3>Unidad administrativa</h3></center>
					<center><h3>Gestión de usuarios</h3></center>
				</div>
				<div class="widget widget-table action-table">
					@can('create user')
					<div class="widget-header"><a href="{{ url('/usuarios/create')}}" class="btn btn-success">Nuevo usuario</a></div>
					@endcan
					<div class="widget-content">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
								<th>Usuario</th>
								<th>Nombre</th>
								<th>Apellido</th>
                            	<th>Correo</th>
                            	<th>Rol</th>
                            	<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $usuario)
								<tr>
								<td>{{ $usuario->username }}</td>
								<td>{{ $usuario->name }}</td>
								<td>{{ $usuario->surname }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->roles->implode('name',',')}}</td>
                                <td>
                                @can('update user')
                                    <a href="{{ url('/usuarios/'.$usuario->id.'/edit')}}" class="btn btn-primary">Editar</a>
                                @endcan
                                @can('delete user')
                                    @include('usuarios.delete',['usuario' => $usuario])
                                @endcan
                                </td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>	
				</div>
			</div>
		</div>
	</div>

</div>
@endsection
