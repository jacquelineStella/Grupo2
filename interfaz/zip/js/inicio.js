// Variables Globales
var url_webservice = "http://www.sucursal24.com/emanuel/api"; 

//var url_webservice = "http://localhost/web_service_basico";
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
    $("#iniciar").click(function(){
        var usuario = validar_datos_inicio();
        //var recurso = "/usuario/registro/"
        var recurso = "/cuenta/inicio";

        if (usuario.length > 0) { // No es vacio
            $.ajax({  // campos: {'nombre', 'apellido', 'email', 'telefono', 'password'} 
                url: url_webservice + recurso,
                type: 'POST',
                data: 'usuario='+usuario[0]+'&password='+usuario[1],
                success: function (datos) {
                    console.log(datos);
                    if(datos.msj == true){  // Si se guardo correctamente
                        console.log("El registro fue exitoso");
                        window.location.replace("principal.html");

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


    function validar_datos_inicio() {
        // captura los datos de los inputs y validar los datos
       
        var email = $("#email").val();
        var password = $("#password").val();        
        var text1 = document.getElementById("text1");
        var text2 = document.getElementById("text2");        
        var expMail= /^[0-9a-zA-Z._.-]+\@[0-9a-zA-Z._.-]+\.[0-9a-zA-Z]+$/;
        var exp= /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,})$/;

        if (email==""){
            text1.innerHTML="*Debe completar el email";
            InsertarClaseError("text1");
            return false;

        }else if((expMail.test(email) == 0) || (email.length = 0)){
            text1.innerHTML="*Debe completar un email valido";
            InsertarClaseError("text1");
            return false;
        }else{
            EliminarClaseError("text1");
            text1.innerHTML="";
        }

        if (password==""){
            text2.innerHTML="*Debe completar la contraseña";
            InsertarClaseError("text2");
            return false;

        }else if((exp.test(password) == 0) || (password.length = 0)){
            text2.innerHTML="*Debe completar una contraseña con numeros y letras";
            InsertarClaseError("text2");
            return false;
        }else{
            EliminarClaseError("text2");
            text2.innerHTML="";
        }






        // Crear una array con los datos formato: {'nombre', 'apellido', 'email', 'telefono', 'password'}
        var datos = new Array(email, password);


        // Retorna el array
        return datos;
    }

    function InsertarClaseError(id){
        var elemento = document.getElementById(id);

        if(!elemento.classList.contains("error")){
            elemento.classList.add("error");
        }
    }

    function EliminarClaseError(id){
        var elemento = document.getElementById(id);

        if(elemento.classList.contains("error")){
            elemento.classList.remove("error");
        }
    }    


});

