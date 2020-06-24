$(document).ready(function() {
    $('#bitacora').DataTable({
    	"language":{
    			"decimal": "",
        	  	"emptyTable": "No hay información",
	        	"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
	        	"infoEmpty": "Mostrando 0 a 0 de 0 registros",
	        	"infoFiltered": "(Filtrando _MAX_ registros)",
	        	"infoPostFix": "",
	        	"thousands": ",",
	     		"lengthMenu": "Mostrar _MENU_ registros",
	        	"loadingRecords": "Cargando...",
	        	"processing": "Procesando...",
	        	"search": "Buscar:",
	        	"zeroRecords": "Sin resultados encontrados",
	        	"paginate": {
	            	"first": "Primero",
	            	"last": "Ultimo",
	            	"next": "Siguiente",
	            	"previous": "Anterior"
	     		}
    		  	
    	}
    });
} );