@extends('layout')
@section('titulo')
  Producto menos movimiento
@endsection
@section('nombrevista')
  Productos con menos movimiento y descuento aplicar
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
					<center><h3>Productos con menos movimiento y descuento aplicar</h3></center>
				</div>
				<div>
					<h3>Fecha de generación:{{$fecha}}</h3>
				</div>
				<div>
					{{Form::open(array('route'=>'productos.menosdemanda','method'=>'POST'))}}
						{{ Form::label('Desde:', null, ['class' => 'control-label'])}}
						{{Form::date('desde',['class'=>'form-control'])}}

					{{ Form::close() }}
				</div>
				<div class="span3">
					<a href="{{route('productos.actuales')}}" title="" class="btn btn-info">Generar reporte</a>
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
									<th>Código</th>
									<th>Nombre</th>
									<th>Cantidad</th>
									<th>Total de venta</th>
									<th>Descuento</th>
									<th>Categoría</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
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
