// Variables Globales
var url_webservice = "http://www.sucursal24.com/emanuel/"; 
//var url_webservice = "http://localhost/grupo2/Grupo2/";
var recurso = "/usuario/";


// Se ejecuta solo si carga el documento
$(document).ready(function(){

    // Login: Envia los datos al servidor, en caso de exito resive un json con los datos
    //                                     en otro caso resive un json vacio
    $("#btn_login").click(function(){

           var usuario = validar_datos();
           var recurso = "usuario/iniciar/"
           
           

           if (usuario.length > 0) { // No es vacio
                $.ajax({
                    url: url_webservice + recurso + "-/-/" + usuario[0] + "/-/" + usuario[1],
                    type: 'POST',
                    dataType: 'JSON',
                    success: function (datos) {
                        console.log(datos);
                        if(datos.msj == true){  // Si el login correcto
                            $("#resultado").html("Usuario: " + datos.nombre);
                            // Abre la pagina principal
                            window.location.replace("principal.html");

                        }else {
                            $("#resultado").html("Datos invalidos");
                        }
                    }
                });

           } else { // Si es vacio, notifica que ingresa datos validos
                $("#resultado").html("Datos invalidos");
           }

    });


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


    function validar_datos() {
        // captura los datos de los inputs y validar los datos
        // var email = $("#input_email").val();
        // var pass = $("#input_password").val();
        var email = $("widgetu116_input").val();
        var pass = $("widgetu112_input").val()


        // Crear una array con los datos formato: ['email', 'password']
        var datos = new Array(email, pass);


        // Retorna el array
        return datos;
    }


    function validar_datos_registro() {
        // captura los datos de los inputs y validar los datos
        var nombre = $("#nombre").val();
        var apellido = "-";
        var email = $("#email").val();
        var telefono = 0;
        var password = $("#password").val();


        // Crear una array con los datos formato: {'nombre', 'apellido', 'email', 'telefono', 'password'}
        var datos = new Array(nombre, apellido, email, telefono, password);


        // Retorna el array
        return datos;
    }

});




