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