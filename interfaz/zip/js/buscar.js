window.onload = function() {
   $.ajax({
            url: 'http://sucursal24.com/emanuel/mascota/listar/adopcion',
            type: 'POST',
            dataType: 'JSON',
            success: function (data) {
               
                for (var c = 0; c < data.length; c++) {
                    var cuadro;
                    cuadro += '<div class="row"><div class="col s12 m7"><div class="card horizontal hoverable small">';
                    var info = '<div class="card-image"><img src="imagen1.png" class="circle responsive-img"></div>';
                    info += '<div class="card-stacked"><div class="card-content"><ul><h5>Descripcion:</h5> <li>Color:'+data[c].color+'</li><li>Especie:' + data[c].especie +'</li></li><li>Raza:' + data[c].raza +'</li></ul></div>';
                    cuadro += info;
                    cuadro += "</div></div></div>";
                    
                }
               
                $("#fila").html(cuadro);
            }
        })
};








          
         