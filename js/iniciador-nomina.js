$(document).ready(function(){
    $("#submitConsultar").click(function() {

        var idNomina = $('#ciden').val();
        var idEmpleado = $('#cempl').val();

        if (idNomina == '' && idEmpleado == ''){
            $('#ciden').focus().addClass('campo_error');
            return false;
        }else{
            var parametros = 'idNomina=' + idNomina + '&idEmpleado=' + idEmpleado;
            $.ajax({
                type: 'POST',
                url: 'http://factoryfoods.info/php/consulta-nomina.php',
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

        var nomina = $('#iden').val();
            empleado = $('#empl').val();
            sueldo = $('#suel').val();
            forma = $('#frma').val();
            cuenta = $('#cuen').val();

        if (empleado == ''){
            $('#empl').focus().addClass('campo_error');
            return false;
        }else if(sueldo == ''){
            $('#suel').focus().addClass('campo_error');
            return false;
        }else{
            var datos = 'nomina=' + nomina + '&empleado=' + empleado + '&sueldo=' + sueldo + '&forma=' + forma + '&cuenta=' + cuenta;
            $.ajax({
                type: 'POST',
                url: 'http://factoryfoods.info/php/administrar-nomina.php',
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