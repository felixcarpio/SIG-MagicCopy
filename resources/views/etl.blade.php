@extends('layout')
@section('meta')
 <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('titulo')
  ETL
@endsection
@section('nombrevista')
  ETL
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
					<center><h3>ETL</h3></center>
				</div>
			
				<div class="widget widget-table action-table">
					<div class="widget-content">
					
									<h4>Extracci&oacute;n - Transformaci&oacute;n - Carga</h4>
									 <p>Este bot&oacute;n ejecutar&aacute; el proceso de Extraci&oacute;n, Transformaci&oacute;n y Carga de datos.
            Dicha acci&oacute;n causar&aacute; que los <strong>datos nuevos</strong> ingresados en el servidor principal, sean importados
            al sistema de apoyo gerencial. <strong>Se consideran datos nuevos, todos los registros realizados a partir de
            hace un d&iacute;a a la 00:00 horas </strong></p>
          <p><strong>Por favor. No cierre la pagina hasta que se le notifique la finalizaci&oacute;n del proceso.
          Si lo hace la actualizaci&oacute;n no tendr&aacute; efecto alguno.</strong></p>
									
						
					</div>	
				</div>
				   <button id="btnGenETL" type="button" class="btn btn-primary btn-lg" onclick="getMessage()">Iniciar ETL</button>
				   	<div id='msg'></div>
			</div>
		</div>
	</div>

</div>
@endsection
@section('script')
<<script>
	window.getMessage = function() {

          $('#btnGenETL').attr('disabled', 'true');

          var imag = "<img style='width:100px; height:100px;'  src='{{ asset('img/loading.gif') }}' class='img-fluid pull-xs-left' alt='Cargando...'>"
          $('#msg').html(imag + '<p class="alert alert-info"> Procesando. Por favor, no cierre esta ventana.</p>');

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
           $.ajax({
              type:'POST',
              url:'/etl/run',
              data:'',
              success:function(data) {
                console.log(data)
                 $("#msg").html(data.msg);
                 $("#msg").attr('class','alert alert-info col-sm-10');
                 $('#btnGenETL').removeAttr('disabled');
              },
              error:function(data){
                console.log(data)
                $("#msg").html(data.responseJSON['msg']);
                $("#msg").attr('class', 'alert alert-danger col-sm-10');
                $('#btnGenETL').removeAttr('disabled');
              }
           });

        }
</script>
@endsection
