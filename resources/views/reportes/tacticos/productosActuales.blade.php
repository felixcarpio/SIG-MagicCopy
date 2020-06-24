@extends('layout')
@section('titulo')
  Productos actuales
@endsection
@section('nombrevista')
  Informe de productos actuales y existencia
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
					<center><h3>Informe de productos actuales y existencia</h3></center>
				</div>
				<div>
					<h3>Fecha de generación:{{$fecha}}</h3>
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
					<div class="widget-content">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Código</th>
									<th>Nombre</th>
									<th>No de unidades</th>
								</tr>
							</thead>
							<tbody>
								@if($products)
								@foreach($products as $product)
								<tr>
									<td>{{$product->codigo_producto}}</td>
									<td>{{$product->nombre}}</td>
									<td>{{$product->existencia_producto}}</td>
								</tr>
								@endforeach
								@else
								<h3>No datos</h3>
								@endif
								<tr>
									<td><strong>Total</strong> </td>
									<td></td>
									<td>{{$total}}</td>
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


