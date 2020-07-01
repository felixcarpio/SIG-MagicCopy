@extends('layout')
@section('titulo')
  Bitacora
@endsection
@section('nombrevista')
  Bitacora de sistema
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
					<center><h3>Bitácora</h3></center>
				</div>
				<div class="widget widget-table action-table">
					<div class="widget-content">
						<table  id="bitacora" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>Usuario</th>
									<th>Nombre</th>
									<th>Fecha acceso</th>
									<th>Acción realizada</th>
								</tr>
							</thead>
							<tbody>
								@if($bitacoras)
								@foreach($bitacoras as $bitacora)
								<tr>
									<td>{{$bitacora->usuario}}</td>
									<td>{{$bitacora->nombre}}</td>
									<td>{{date('d-M-y H:i:s',strtotime($bitacora->created_at)) }}</td>
									<td>{{$bitacora->accion}}</td>
								</tr>
								@endforeach
								@else
								<h3>No datos</h3>
								@endif
							</tbody>
						</table>
					</div>	
				</div>
			</div>
		</div>
	</div>

</div>

@endsection
@section('script')
<script  type="text/javascript"  async defer>
</script>
@endsection
