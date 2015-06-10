$(document).ready(function(){
    $("#submitConsultar").click(function() {

        var idEmpleado = $('#ciden').val();
        var rfc = $('#rfc').val();
        var nss = $('#nss').val();

        if (idEmpleado == '' && rfc == '' && nss == ''){
            $('#ciden').focus().addClass('campo_error');
            return false;
        }else{
            var parametros = 'idEmpleado=' + idEmpleado + '&rfc=' + rfc + '&nss=' + nss;
            $.ajax({
                type: 'POST',
                url: 'http://factoryfoods.info/php/consulta-empleados.php',
                data: parametros,
                beforeSend: function () {
                    $("#notifier").html('Procesando, espere por favor...');
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

        var empleado = $('#iden').val();
            nombres = $('#nomb').val();
            paterno = $('#apep').val();
            materno = $('#apem').val();
            puesto = $('#pues').val();
            departamento = $('#dept').val();
            antiguedad = $('#anti').val();
            rfc = $('#rfc').val();
            nss = $('#nss').val();

        if (nombres == ''){
            $('#nomb').focus().addClass('campo_error');
            return false;
        }else if(rfc == ''){
            $('#rfc').focus().addClass('campo_error');
            return false;
        }else if(nss == ''){
            $('#nss').focus().addClass('campo_error');
            return false;
        }else{
            var datos = 'empleado=' + empleado + '&nombres=' + nombres + '&paterno=' + paterno + '&materno=' + materno + '&puesto=' + puesto + '&departamento=' + departamento + '&antiguedad=' + antiguedad + '&rfc=' + rfc + '&nss=' + nss;
            $.ajax({
                type: 'POST',
                url: 'http://factoryfoods.info/php/administrar-empleados.php',
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
