// Variables Globales
// var url_webservice = "http://www.sucursal24.com/emanuel/"; 
var url_webservice = "http://localhost/Grupo2/AplicacionFinal/Sitio sin nombre";
var recurso = "/usuario/";
var expNombre=/^[a-zA-Z\s]*$/



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
        var validacion=true;
        var email= document.getElementById("email");
        var textoEmail = document.getElementById("emailLabel");
        var pass= document.getElementById("contraseña");
        var textoContraseña = document.getElementById("contraseñaLabel");
        var expEmail= /^[0-9a-zA-Z._.-]+\@[0-9a-zA-Z._.-]+\.[0-9a-zA-Z]+$/;
        var contraseña=/^[A-Z].*/;
        
        if (email.value=="") {
            textoEmail.innerHTML="*Debe completar un email";
            InsertarClaseError("emailLabel");
         validacion=false;
        }else if((expEmail.test(email.value) == 0) || (email.value.length = 0)){
            textoEmail.innerHTML="*Debe completar un email valido";
            InsertarClaseError("emailLabel");
            validacion=false;
        }else{
            EliminarClaseError("emailLabel");
            textoEmail.innerHTML="";
        }
    
        if (pass.value == ""){
            textoContraseña.innerHTML="*Debe completar la contraseña";
            InsertarClaseError("contraseñaLabel");
            validacion=false;
        }else if((contraseña.test(pass.value) == 0) || (pass.value.length = 0)){
            textoContraseña.innerHTML="*La contraseña debe tener la primer letra en mayuscula";
            InsertarClaseError("contraseñaLabel");
            validacion=false;
        }else{
            EliminarClaseError("contraseñaLabel");
            textoContraseña.innerHTML="";
        }      
            

        //Si la validacion esta bien,validacion envia formulario
        //
        if (validacion==true){  
            // Crear una array con los datos formato: ['email', 'password']
            var mail= email.value;
            var con= pass.value;
            var datos = new Array(mail, con);

            // Retorna el array
            return datos;                 
            
        }else{
            return Array();
        }

      
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




//clases para usar en la validacion
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




