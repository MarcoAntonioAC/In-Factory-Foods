$(document).ready(function(){
    $("#submitConsultar").click(function() {

    	var idActividad = $('#ciden').val();

        if (idActividad == ''){
            $('#ciden').focus().addClass('campo_error');
            return false;
        }else{
            var parametros = 'idActividad=' + idActividad;
            $.ajax({
                type: 'POST',
                url: 'http://factoryfoods.info/php/consulta-actividades.php',
                data: parametros,
                beforeSend: function () {
                    $('#notifier').html("Procesando, espere por favor...");
                    $('#notifier').css("background-color","#009CDE");
                    $('#notifier').css("color","white");   
                },
                success:  function (response) {
                    $('#notifier').html('Se ha encontrado la siguiente información:');
                    $('#notifier').css("background-color","#7ABD3D"); 
                    $('#resultado').html(response)
                },
                error: function(response){
                    $('#notifier').html('Un error interno impidio hacer la consulta!');
                }
            });
            return false;
        }	
    });

	$("#submitGuardar").click(function() {

        var actividad = $('#iden').val();
            nombre = $('#acti').val();
            descripcion = $('#desc').val();
            departamento = $('#dept').val();
            fecha = $('#fech').val();
            encargado = $('#enca').val();

        if (nombre == ''){
            $('#acti').focus().addClass('campo_error');
            return false;
        }else if(descripcion == ''){
            $('#desc').focus().addClass('campo_error');
            return false;
        }else if(fecha == ''){
            $('#fech').focus().addClass('campo_error');
            return false;
        }else if(encargado == ''){
            $('#enca').focus().addClass('campo_error');
            return false;
        }else{
            var datos = 'actividad=' + actividad + '&nombre=' + nombre + '&descripcion=' + descripcion + '&departamento=' + departamento + '&fecha=' + fecha + '&encargado=' + encargado;
            $.ajax({
                type: 'POST',
                url: 'http://factoryfoods.info/php/administrar-actividades.php',
                data: datos,
                beforeSend: function () {
                    $('#confirm').text('Procesando, espere por favor...');
                    $('#confirm').css("background-color","#009CDE"); 
                    $('#confirm').css("color","white");   
                },
                success: function() {
                    $('#confirm').text('Información guardada con exito!');
                    $('#confirm').css("background-color","#7ABD3D");  
                    $('#formAdmin')[0].reset()
                },
                error: function() {
                    $('#confirm').innerHTML = "<p>Problemas al cargar la información!</p>";    
                    $('#confirm').css("background-color","red");        
                }
            });
            return false;
        }
    });
});
