// Variables Globales
var url_webservice = "http://www.sucursal24.com/emanuel/api"; 

//var url_webservice = "http://localhost/grupo2/apirest";
var recurso = "/cuenta/iniciar";



// Se ejecuta solo si carga el documento
$(document).ready(function(){

    /* INICIAR:
       --------
        1. Lee los inputs y valida.
        2. Envia los datos.
        3. Recibe JSON con los datos
        4. if respuesta.success = true, redirige a la pagina principal
    */
    $("#iniciar").click(function(){
        var usuario = validar_datos_inicio();
        //var recurso = "/usuario/registro/"
        var recurso = "/cuenta/iniciar/";

        if (usuario.length > 0) { // No es vacio
            $.ajax({  // campos: {'nombre', 'apellido', 'email', 'telefono', 'password'} 
                url: url_webservice + recurso,
                type: 'POST',
                data: 'usuario='+usuario[0]+'&password='+usuario[1],
            }).done(function(respuesta){
                if (respuesta.success==true) {
                    //console.log(respuesta);
                    Materialize.toast("Logueo correcto", 4000)
                    window.location.replace("principal.html");

                }else{
                    //console.log(respuesta);
                    Materialize.toast(respuesta.message, 4000)

                }


            });
                
     }   

    });


    function validar_datos_inicio() {
        // captura los datos de los inputs y validar los datos
       
        var email = $("#email").val();
        var password = $("#password").val();        
        var text1 = document.getElementById("text1");
        var text2 = document.getElementById("text2");        
        var expMail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/ ;
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


        // Crear una array con los datos formato: {'email', 'password'}
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

