<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style type="text/css" media="screen">
		body {
  			font-family: Arial, Helvetica, sans-serif;
		}

		#customers {
  			font-family: Arial, Helvetica, sans-serif;
  			border-collapse: collapse;
  			width: 100%;
		}

		#customers td, #customers th {
		  border: 1px solid black;
		  padding: 8px;
		}

		#customers th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: left;
		  background-color: white;
		  color: black;
		}

		#fechas{
			border-collapse: collapse;
  			border: 0px solid black;
		}
</head>
<body>
	<div>
		<center><h3>Librería el Páramo</h3></center>
		<center><h3>Unidad administrativa</h3></center>
		<center><h3>Informe de comparación de ventas de producto</h3></center>
	</div>
	<div>
		<h3>Fecha de generación:{{$fecha}}</h3>
	</div>
	<div id="columna">
		<table id="fechas">
		<thead>
			<tr>
				<th width="40%"><h3 id="fechaini">Desde:{{$fechaini}}</h3></th>
				<th width="20%"><h3 id="producto">Producto:{{$producto}}</h3></th>
				<th width="60%"><h3 id="fechafin">Hasta:{{$fechafin}}</h3></th>
			</tr>
		</thead>
	</table>
	</div>
	<table id="customers">
		<thead>
			<tr>
                <th width="20%">Fecha venta</th>
                <th width="15%">Cantidad unidades</th>
                <th width="15%">P/U</th>
                <th width="10%">Subtotal</th>
                <th width="20%">Subtotal con Descuento</th>
                <th width="20%">Total</th>
			</tr>
		</thead>
		<tbody>
            @foreach ($datos as $key => $dato)
                <tr>
                    <td>{{date('d/m/Y', strtotime($dato->fecha_emision))}}</td>
                        <td>{{$dato->unidades}}</td>
                        <td>${{$dato->preciounitario}}</td>
                        <td>${{$dato->subtotal}}</td>
                        <td>${{$dato->descuento}}</td>
                        <td>${{$dato->total_iva}}</td>
                </tr>
            @endforeach
		</tbody>
	</table>
</body>
</html>