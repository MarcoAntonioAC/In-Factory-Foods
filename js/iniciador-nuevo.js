$(document).ready(function(){
    $('#submitEnviar').click(function(){

        var nickname = $('#user').val();
            nombres = $('#nomb').val();
            apellidos = $('#apel').val();
            contrasena = $('#pass').val();
            contrasenac = $('#conf').val();
            trabajador = $('#ntra').val();
            nacimiento = $('#fnac').val();
 
        if (nickname == '') {
            $('#nickname').focus();
            return false;
        }else if(contrasena != contrasenac){
            alert('Contraseña introducida incorrectamente!'); 
            return false;
        }else{
            var datos = 'nickname='+ nickname + '&nombres=' + nombres + '&apellidos=' + apellidos + '&contrasena=' + contrasena + '&trabajador=' + trabajador + '&nacimiento=' + nacimiento;
            $.ajax({
                type: 'POST',
                url: 'http://factoryfoods.info/php/proceso-nuevo.php',
                data: datos,
                success: function() {
                    alert('Usuario creado exitosamente!'); 
                    document.getElementById("fomulario").reset();
                },
                error: function() {
                    alert('Problemas al crear el usuario!');              
                }
            });
            return false;
        }  
    });
});