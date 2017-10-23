// Variables Globales
// var url_webservice = "http://www.sucursal24.com/emanuel/"; 

var url_webservice = "http://localhost/web_service_basico";
var recurso = "/cuenta/registrar";



// Se ejecuta solo si carga el documento
$(document).ready(function(){

    /* REGISTRO:
       --------
        1. Lee los inputs y valida.
        2. Genera el JSON (por desarrollar cuando este modificado el webservice)
        3. Envia los datos
        4. Confirma registro al usario
    */
    $("#btn_registro").click(function(){
        var usuario = validar_datos_registro();
        var recurso = "usuario/registro/"

        if (usuario.length > 0) { // No es vacio
            $.ajax({  // campos: {'nombre', 'apellido', 'email', 'telefono', 'password'}
                url: url_webservice + recurso + usuario[0] + "/" + usuario[1] + "/" + usuario[2] + "/" +  usuario[3] + "/" +  usuario[4],
                type: 'POST',
                dataType: 'JSON',
                success: function (datos) {
                    console.log(datos);
                    if(datos.msj == true){  // Si se guardo correctamente
                        console.log("El registro fue exitoso");
                        window.location.replace("index.html");

                    }else {
                        console.log("El email ya existe");
                        alert("El email ya existe");
                        }
                    }
                });

        } else { // Si es vacio, notifica que ingresa datos validos
            alert("Datos invalidos");
        }
        

    });


    function validar_datos_registro() {
        // captura los datos de los inputs y validar los datos
        var email = $("#email_registro").val();
        var password = $("#password-1_registro").val();


        // Crear una array con los datos formato: {'nombre', 'apellido', 'email', 'telefono', 'password'}
        var datos = new Array(email, password);


        // Retorna el array
        return datos;
    }



});

