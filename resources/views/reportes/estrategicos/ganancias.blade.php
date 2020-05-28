@extends('layout')
@section('titulo')
Ganancias generadas
@endsection
@section('nombrevista')
Ganancias generadas
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
					<center><h3>Informe de ganancias generadas</h3></center>
				</div>
				<div>
					<h3>Fecha de generación:{{$fecha}}</h3>
				</div>
				@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
				@endif
				@if ($errors->any())
				<div class="alert alert-danger">
					<strong>Error! </strong>Datos invalidos introducidos.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<div class="span12">
					<form action="{{route('ganancias.periodo')}}" method="POST" id="form_fechas">
						@csrf
						<div class="span4">
							<div class="form-group">
								<h3 style="display: inline-block; width: 80px;">Desde:</h3>
								<input type="date"  class="form-control" name="Desde">
							</div>
						</div>
						<div class="span4">
							<div class="form-group">
								<h3 style="display: inline-block; width: 80px;">Hasta:</h3>
								<input type="date"  class="form-control" name="Hasta">
							</div>
						</div>
					</form>
				</div>
				<div class="span3">
					<button type="submit" class="btn btn-info" form="form_fechas">Generar reporte</button>
				</div>
				<div class="span3">
					@if($pdf == 0)
					<button  disabled="" class="btn btn-danger">Imprimir PDF</button>
					@else
					<a href="{{route('productos.pdf')}}" class="btn btn-danger">Imprimir PDF</a>
					@endif
				</div>
				<div class="span3">
					<a href="{{url('/')}}" title="" class="btn btn-secondary">Regresar</a>
				</div>
				<div class="widget widget-table action-table">
					<div class="widget-header"> <i class="icon-th-list"></i>
					</div>
					<div class="widget-content">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th width="70%">Nombre</th>
									<th width="30%">Monto</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td></td>
								</tr>
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

@endsection
