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
                    <center><h3>Comparativa de Ventas</h3></center>
                    <br><br><br>
                    <center><h3><strong>Resultado de la Comparativa de Ventas</h3></strong></center>
                    <br>
                    <center><h3>Total de ventas desde {{date('d/m/Y', strtotime($fechaini1))}} hasta {{date('d/m/Y', strtotime($fechafin1))}}:  ${{$monto1}}</h3></center>
                    <br>
                    <center><h3>Total de ventas desde {{date('d/m/Y', strtotime($fechaini2))}} hasta {{date('d/m/Y', strtotime($fechafin2))}}:  ${{$monto2}}</h3></center>
                </div>
                <div class="span12">
                    <a href="{{route('compararGanancia')}}"><button type="submit" class="btn btn-info">Regresar</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection