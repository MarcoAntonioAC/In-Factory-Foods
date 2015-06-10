$(document).ready(function(){
    $("#submitEnviar").click(function() {

        var nombre = $("#nomb").val();
            empleado = $("#user").val();
            correo = $("#correo").val();
            fecha = $("#fecha").text();
            clase = $("#clase").val();
            descripcion = $("#desc").val();

 
        if (empleado == "") {
            $("#user").focus();
            return false;
        }else if(descripcion == ""){
            $("#descripcion").focus();
            return false;
        }else{
            var datos = 'nombre=' + nombre + '&empleado=' + empleado + '&correo=' + correo + '&fecha=' + fecha + '&clase=' + clase + '&descripcion=' + descripcion;
            $.ajax({
                type: "POST",
                url: "http://factoryfoods.info/php/proceso-soporte.php",
                data: datos,
                success: function() {
                    alert("Mensaje enviado al departamente de soporte! \n\n En breve nos pondremos en contacto para resolver su solicitud.");
                    document.getElementById("formSoporte").reset();
                },
                error: function() {
                    alert("Mensaje enviado al departamente de soporte! \n\n ");             
                }
            });
            return false;
        }  
    });
});