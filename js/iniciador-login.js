$(document).ready(function(){
    $('#login_submit').click(function(){

        var nickname = $('#user').val();
            contrasena = $('#pass').val();
 
        if (nickname == '') {
            alert('Ingrese su Nombre de Usuario');
            $('#user').css("background-color", "#F6C5C5");
            return false;
        }else if(contrasena == ''){
            alert('Ingrese su Contraseña'); 
            $('#pass').css("background-color", "#F6C5C5");
            return false;
        }else{
            var datos = 'nickname='+ nickname + '&contrasena=' + contrasena;
            $.ajax({
                type: 'POST',
                url: 'http://factoryfoods.info/php/proceso-login.php',
                data: datos,
                success: function(responseText) {

                    if(responseText == 1){

                        $('h2').text('¡Bienvenido de nuevo!').addClass('login_ok');
                        function redireccionar(){
                            window.location="http://factoryfoods.info/inicio.php";
                        }
                        setTimeout (redireccionar, 1000);

                    }else if(responseText == 0){

                        $('h2').text('Usuario o Contraseña incorrectos').addClass('login_error');

                    }else{

                        alert(responseText);

                        $('h2').text('Problemas con el servidor, disculpe las molestias...').addClass('server_error');

                    }

                }
            });
            return false;
        }  
    });
});