// Variables Globales
var url_webservice = "http://localhost/grupo2/Grupo2";
var recurso = "/usuarios/mostrar2"


// Se ejecuta solo si carga el documento
$(document).ready(function(){
    console.log("ejecuta");
});



// Definicion del Objeto usuario
function Usuario() {
    this.id = localStorage.getItem("Id");
    this.nombre = localStorage.getItem("Nombre");
    this.email = localStorage.getItem("Email");
    this.foto = localStorage.getItem("Foto");
}


var user =  new Usuario();  // Instancia al objeto

console.log(user.email);


/* REGISTRO DE USUARIO 
   -------------------


*/

function registro() {
    console.log("registrar usuario");
}


/* INICIO DE SESION
   ----------------
    1- Envia al webservice los datos de usuario y contraseña y recibe un objeto con el estado
    2- Si mensaje = "encontrado" : carga los datos del usuario.

*/

function login() {

	// $("#datos-usuario").html("nuevo");
    $.ajax({
    	url: 'http://localhost/grupo2/Grupo2/usuarios/mostrar2',
    	type: 'POST',
    	dataType: 'JSON',
    	success: function (datos) {
            console.log(datos);
            if(datos.msj == 'Usuario encontrado'){

                user.id = datos.id_usuario; 
                user.nombre = datos.nombre;

                user.email = datos.email;
                $("#p1").html(user.nombre);
                $("#p2").html(user.email);
               
                console.log(user.foto);
                console.log(user.email);

            }else {
                $("#datos-usuario").html("Usuario no Registrado");
            }

        }
    });
}


// Utiliza localStorage para guardar los datos de sesion
function guardarSesion(objetoPersona) {

    localStorage.setItem("Id", objetoPersona.id);
    localStorage.setItem("Nombre", objetoPersona.nombre);
    localStorage.setItem("Email", objetoPersona.email);
    localStorage.setItem("Foto", "ImagenDefault");
}


