<?php
// Permite la conexion desde cualquier origen
header("Access-Control-Allow-Origin: *");
// Permite la ejecucion de los metodos
header("Access-Control-Allow-Methods: GET, POST");  
//requiere_once(MODELOS . 'mascotasModelo.php');
//requiere_once(VISTAS . 'mascotasView.php');
require_once(MODELOS . 'mascotaModel.php');

class MascotasController {

	public function listar($motivo='') {
		// Verifica si recibio parameteros
		if (isset($motivo[0]) && $motivo != null){
			// Funcion listar  . $motivo[0]
			if(method_exists($this, $motivo[0]) && $motivo[0] != 'listar') {  // si existe el metodo...
				// Se ejecutar el metodo: " . $motivo[0];
				$this->{$motivo[0]}();

			}else{
				echo "No existe este metodos: " . $motivo[0] . '<br/>';
			}
		}else {
			// retorna un JSON vacio o con msj: No se definio motivo
			//echo "No se definio parameteros";
		}
		
	}


	public function publicar($datos=array()) {

		// formato {foto, color, edad, especie, raza}
		if (isset($datos) && is_array($datos)) {
			if (count($datos) > 4) {  // Evalua que tenga todos los campos
				
				// Instancia al modelo
				$mascota = new Mascota();
				// Modifica las propiedades
				$array = array('foto' => $datos[0], 
								'color' => $datos[1],
								'edad' => $datos[2],
								'especie' => $datos[3],
								'raza' => $datos[4] 
								);
				
				$mascota->set($array);
			// Retorna el estado
				echo json_encode($mascota);
			}

		} else {
			echo json_encode(array());
		}

		
	}


	private function adopcion() {
		// 1.Instancia al modelo

		// 2.Recibe la query

		// 3.Retorna el JSON

			// Simulamos el JSON
			$mascotas = array(
				array('id_mascota'=>'01', 'foto' => 'imagen01.jpg', 'color'=>'blanco', 'especie'=>'perro', 'raza'=>'Dogo'),
				array('id_mascota'=>'02', 'foto' => 'imagen02.jpg', 'color'=>'marron', 'especie'=>'perro', 'raza'=>'Indefinido'),
				array('id_mascota'=>'03', 'foto' => 'imagen03.jpg', 'color'=>'amarillo', 'especie'=>'gato', 'raza'=>'Indefinido'),
				array('id_mascota'=>'04', 'foto' => 'imagen04.jpg', 'color'=>'marron', 'especie'=>'perro', 'raza'=>'Coker'),
				);
			header('Content-Type: application/json');
			echo json_encode($mascotas);
	}

	private function perdidos() {
		// 1.Instancia al modelo

		// 2.Recibe la query

		// 3.Retorna el JSON
	}
	

}

?>