// Variables Globales
var url_webservice = "";


// funciones
function listar() {

    $.ajax({
        url: 'http://localhost/grupo2/mascotas/listar/adopcion/',
        type: 'POST',
        dataType: 'JSON',
        success: function (datos) {
            var size = datos.length;
            if(size > 0){
                var n;
                for(n=0; n < size; n++){
                    $("#mostrarDatos").append("<li>" + datos[n].foto + "</li>");
                    $("#mostrarDatos").append("<li>" + datos[n].especie + " - " + datos[n].raza + " - " + datos[n].color + "</li>");
                }
            }
            else{
                console.log("No hay mascotas.");
            }
        }
    });
}

/* INICIO DE SESION
   ----------------
    1- Envia al webservice los datos de usuario y contraseña y recibe un objeto con el estado
    2- Si son validos:

*/

function login() {

    // $("#datos-usuario").html("nuevo");
    $.ajax({
        url: url_webservice + /usuario/,
        type: 'POST',
        dataType: 'JSON',
        success: function (datos) {
            console.log(datos);

        }
    });
}