@extends('layout')
@section('titulo')
  10 Productos mas Vendidos
@endsection
@section('nombrevista')
  10 Productos mas Vendidos
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
					<center><h3>10 Productos mas Vendidos</h3></center>
				</div>
				<br></br><br></br><br></br>
				<div class="row-fluid stats-box">
					<form action="{{ url('/10_productos_mas_vendidos.mostraProductos') }}" method="post">
						<center><table>
								<tr>
									<th>
										<label>Desde:</label>
										<input type="date" name="Desde" placeholder="dd/mm/yyyy" max="9999-12-31" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" required>
									</th>
									<th>
										<label>Hasta:</label>
										<input type="date" name="Hasta" placeholder="dd/mm/yyyy" max="9999-12-31" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" required>
									</th>
								</tr>
								<tr>
									<td>
										<center><input type="submit" value="Generar Informe" class="btn btn-success"></center>
									</td>
									<td>
										<center><a href="{{url('/home')}}" class="btn btn-default">Regresar</a></center>
									</td>
								</tr>
						</table></center>
					</form>
				</div>
				<div class="widget widget-table action-table">
					<div class="widget-header"> <i class="icon-th-list"></i>
					</div>
					<div class="widget-content">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Codigo del producto</th>
									<th>nombre</th>
									<th>Cantidad de unidades</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
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

