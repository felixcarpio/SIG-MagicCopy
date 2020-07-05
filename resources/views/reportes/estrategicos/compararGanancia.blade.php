@extends('layout')
@section('titulo')
Comparativa de Ventas
@endsection
@section('nombrevista')
Comparativa de Ventas
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
                    <center><h3>Informe de comparación de ventas de producto</h3></center>
                </div>
                <div>
                    <h3>Fecha de generación: {{$fecha}}</h3>
                </div>
                @if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
				@endif
                @if ($errors->any())
				<div class="alert alert-danger">
					<strong>Error! </strong>Datos invalidos introducidos.<br><br>
					La fecha inicial es mayor que la fecha final.
				</div>
				@endif
                <div class="span12">
                    <form action="{{route('compararGanancia.comp')}}" method="GET" id="comparativa">
                        @csrf
                        <div class="span3">
                            <div class="form-group">
                                <h3 style="display: inline-block; width: 120px">Desde: </h3>
                                <input type="date" value="{{$fechaini}}" class="form-control" name="fechaini" required>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="form-group">
                                <h3 style="display: inline-block; width: 120px">Hasta: </h3>
                                <input type="date" value="{{$fechafin}}" class="form-control" name="fechafin" required>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="form-group">
                                <h3 style="display: inline-block; width: 120px">Produto: </h3>
                                <select name="producto" class="custom-select" required>
                                    <option selected="" required></option>
                                    @foreach ($productos as $key => $producto)
                                        <option value="{{$producto->nombre}}">{{$producto->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="span3">
                        <button type="submit" class="btn btn-info" form="comparativa">Generar Reporte</button>
                </div>
                <div class="span3">
					@if($pdf == 0)
					<button  disabled="" class="btn btn-danger">Imprimir PDF</button>
					@else
					<a href="{{route('compararGanancia.pdf',['fechaini'=>$fechaini,'fechafin'=>$fechafin,'producto'=>$producto])}}" class="btn btn-danger">Imprimir PDF</a>
					@endif
				</div>
                <div class="span3">
                    <a href="{{url('/')}}" title="" class="btn btn-secondary">Regresar</a>
                </div>
                <div class="widget widget-table action-table">
                    <div class="widget-header"><i class="icon-th-list"></i></div>
                    <div class="widget-content">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="20%">Fecha venta</th>
                                    <th width="15%">Cantidad unidades</th>
                                    <th width="15%">P/U</th>
                                    <th width="10%">Subtotal</th>
                                    <th width="20%">Descuento</th>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection