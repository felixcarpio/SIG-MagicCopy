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
</head>
<body>
	<div>
		<center><h3>Librería el Páramo</h3></center>
		<center><h3>Unidad administrativa</h3></center>
		<center><h3>Informe de productos actuales y existencia</h3></center>
	</div>
	<div>
		<h3>Fecha de generación:{{$fecha}}</h3>
	</div>
	<table id="customers">
		<thead>
			<tr>
				<th>Código</th>
				<th>Nombre</th>
				<th>No de unidades</th>
			</tr>
		</thead>
		<tbody>
                                @if($codigo)
                                @foreach($codigo as $codig)
                                <tr>
                                    <td>{{$codig}}</td>
                                    
                                </tr>
                                @endforeach
                                @endif

                                @if($nombre)
                                @foreach($nombre as $nom)
                                <tr>
                                    <td>{{$nom}}</td>
                                    
                                </tr>
                                @endforeach
                                @endif
                                
                                @if($cantidad)
                                @foreach($cantidad as $can)
                                <tr>
                                    <td>{{$can}}</td>
                                    
                                </tr>
                                @endforeach
                                @endif

                                @if($total)
                                @foreach($total as $tot)
                                <tr>
                                    <td>{{$tot}}</td>
                                    
                                </tr>
                                @endforeach
                                @endif
                                
                            </tbody>
	</table>
</body>
</html>