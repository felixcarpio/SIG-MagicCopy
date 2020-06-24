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
		<center><h3>Informe de ganancias generadas</h3></center>
	</div>
	<div>
		<h3>Fecha de generación:{{$fecha}}</h3>
	</div>
	<div id="columna">
		<table id="fechas">
		<thead>
			<tr>
				<th width="40%"><h3 id="desde">Desde:{{$desde}}</h3></th>
				<th width="20%"><h3>     </h3></th>
				<th width="60%"><h3 id="hasta">Hasta:{{$hasta}}</h3></th>
			</tr>
		</thead>
	</table>
	</div>
	<table id="customers">
		<thead>
			<tr>
				<th width="70%">Nombre</th>
				<th width="30%">Monto</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Ingresos</td>
				<td>${{$ingreso}}</td>
			</tr>
			<tr>
				<td>Egresos</td>
				<td>${{$egreso}}</td>
			</tr>
			<tr>
				<td><strong>Total</strong></td>
				<td><strong>${{$total}}</strong></td>
			</tr>
		</tbody>
	</table>
</body>
</html>