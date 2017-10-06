// Variables Globales
var url_webservice = "http://www.sucursal24.com/emanuel/"; 


// Se ejecuta solo si carga el documento
$(document).ready(function(){

	// Envia al servidor el email para recibir el password
	    $("#btn_enviar_mail").click(function(){
    		
    		// Antes deberia validar email
           var email = $("#email_envio").val();

           var recurso = "/usuario/enviarpassword/";
           // Fromato: usuario/enviarpassword/user@mail.com
            	$.ajax({
                    url: url_webservice + recurso + email,
                    type: 'POST',
                    dataType: 'JSON',
                    success: function (datos) {
                        console.log(datos);
                        if(datos.estado == "enviado"){  // Si existe el mail en la db
                            $("#resultado").html("Te enviamos el email con tu password");

                        }else {
                            $("#resultado").html("El email es invalido");
                        }
                    }
                });

    });


});







