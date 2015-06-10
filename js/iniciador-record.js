$(document).ready(function(){
    $("#submitConsultar").click(function() {

        var idAsistencia = $('#asis').val();
        var idEmpleado = $('#cempl').val();

        if (idAsistencia == '' && idEmpleado == ''){
            $('#asis').focus().addClass('campo_error');
            return false;
        }else{
            var parametros = 'idAsistencia=' + idAsistencia + '&idEmpleado=' + idEmpleado;
            $.ajax({
                type: 'POST',
                url: 'http://factoryfoods.info/php/consulta-record.php',
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

        var asistencia = $('#iden').val();
            empleado = $('#empl').val();
            nombre = $('#nomb').val();
            fecha = $('#fecha').val();
            hora = $('#hora').val();
            terminal = $('#term').val();

        if (empleado == ''){
            $('#empl').focus().addClass('campo_error');
            return false;
        }else if(nombre == ''){
            $('#nomb').focus().addClass('campo_error');
            return false;
        }else if(terminal == ''){
            $('#term').focus().addClass('campo_error');
            return false;
        }else{
            var datos = 'asistencia=' + asistencia + '&empleado=' + empleado + '&nombre=' + nombre + '&fecha=' + fecha + '&hora=' + hora + '&terminal=' + terminal;
            $.ajax({
                type: 'POST',
                url: 'http://factoryfoods.info/php/administrar-record.php',
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