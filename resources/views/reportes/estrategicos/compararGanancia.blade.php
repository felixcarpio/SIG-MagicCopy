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
                @if ($errors->any())
                <div class="alert alert-danger">
					<strong>Error! </strong>Datos erroneos introducidos.<br>
					La fecha final no puede ser anterior a la inicial.
				</div>
                @endif
                <div class="span12">
                    <center><h3>Librería el Páramo</h3></center>
                    <center><h3>Unidad administrativa</h3></center>
                    <center><h3>Comparativa de Ventas</h3></center>
                </div>
                <div class="span12">
                    <form action="{{ route('compararGanancia') }}" method="POST">
                        @csrf
                        <div class="span12">
                            <h3>Ingrese el primer periodo:</h3>
                        </div>
                        <div class="span4">
                            <div class="form-group">
                                <h3 style="display: inline-block; width: 120px">Fecha Inicio: </h3>
                                <input type="date" value="fechaini1" class="form-control" name="fechaini1" required>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="form-group">
                                <h3 style="display: inline-block; width: 120px">Fecha Fin: </h3>
                                <input type="date" value="fechafin1" class="form-control" name="fechafin1" required>
                            </div>
                        </div>
                        <div class="span12">
                            <h3>Ingrese el segundo periodo:</h3>
                        </div>
                        <div class="span4">
                            <div class="form-group">
                                <h3 style="display: inline-block; width: 120px">Fecha Inicio: </h3>
                                <input type="date" value="fechaini2" class="form-control" name="fechaini2" required>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="form-group">
                                <h3 style="display: inline-block; width: 120px">Fecha Fin: </h3>
                                <input type="date" value="fechafin2" class="form-control" name="fechafin2" required>
                            </div>
                        </div>
                        <div class="span12">
                            <button type="submit" class="btn btn-info">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection