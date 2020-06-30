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
                <div class="span12">
                    <form action="{{route('productosmasvendidos.llenarTabla')}}" method="GET" id="form_fechas">
                        @csrf
                        <div class="span4">
                            <div class="form-group">
                                <h3 style="display: inline-block; width: 80px;">Desde:</h3>
                                <input type="date" value="{{$desde}}" class="form-control" name="Desde">
                            </div>
                        </div>
                        <div class="span4">
                            <div class="form-group">
                                <h3 style="display: inline-block; width: 80px;">Hasta:</h3>
                                <input type="date" value="{{$hasta}}" class="form-control" name="Hasta">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="span3">
                    <button type="submit" class="btn btn-info" form="form_fechas">Generar reporte</button>
                </div>
                <!--div class="span3">
					@if($pdf == 0)
					<button  disabled="" class="btn btn-danger">Imprimir PDF</button>
					@else
					<a href="{{route('reportes.pdf')}}" class="btn btn-danger">Imprimir PDF</a>
					@endif
				</div-->
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
                                    <th>Codigo del producto</th>
                                    <th>nombre</th>
                                    <th>Cantidad de unidades</th>
                                    <th>Total</th>
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
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
