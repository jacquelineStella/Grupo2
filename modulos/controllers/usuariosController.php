<?php
/* Funciones principales:
	* Instancia al modelo
	* Modificar sus propiedades, si es necesario
	* Llamar a un metodo, que retornara un dato
	* Enviar los datos obtenidos del modelo a la vista (Sera un JSON)

	* Tendra una estructura similar:

	class ModeloController {
		public function __construct($recurso='', $argumentos=array() { }
	}

	* instanciara a la vista JSON y la retornar

*/

//requiere_once('usuarioModelo.php');
//requiere_once('usuarioView.php');
require_once(MODELOS . 'usuarioModel.php');

class UsuariosController {
	

	public function __construct($metodo='', $parametro='') {  // $argumentos deberia ser una array con todos los paramentros



		// $this->usuario = new Usuario();
		// call_user_func_array($metodo, $parametro);

	}

	public function registro($datos='') {
		if (isset($datos) && is_array($datos)) {
			if (count($datos) > 4) {  // Evalua que tenga todos los campos
				
				// Instancia al modelo
				$usuario = new Usuario();
				// Modifica las propiedades
				$array = array('nombre' => $datos[0], 
								'apellido' => $datos[1],
								'email' => $datos[2],
								'telefono' => $datos[3],
								'clave' => $datos[4] 
								);
				//print_r($array);
				$usuario->set($array);
				echo $usuario->msj;
					/*public $nombre;
					public $apellido;
					public $email;
					public $telefono;
					private $clave;
					*/
				// Retorna el estado
			}

		}
	}


	public function save($parametros='') {
		// Valida los parametros --> DESARROLLAR HELPER:
		//									Valida los datos, formatea y devuelve un msj si son invalidos
		$campos = (isset($parametros) && $parametros != '') ? $parametros : '';
		echo "-------<br/>";
		$this->formater_array($campos);
		// formateo del array: $campos= array('nombre' => 'pepito',
		//										'apellido' => 'pepe',
		//										'email' => 'pepito@pepelandia.com',
		//										'telefono' => '1122334455'
		//										'clave' => '12jkajdajhuhdauishdahsduasuui1'
		
		

		// Si los parametros son validos instancia al modelos
		// $persona =  new Usuario();
		
		// agrega los datos: nombre, apellido, email, telefono, clave
		//$persona->set($campos); 

		// retorna el estado msj
		//echo $persona->msj;
	}


	private function formater_array( $array) {
		if(is_array($array)) {
			
			
			print_r($array);
		}else {
			echo "no es array";
		}
	}

	// Proteger los metodos a privados!!!
	public function mostrar($parame='') {

		// Seccion de validacion Parametros --> HACER un HELPER
		$parametros = (isset($parame[0]) &&  $parame != '') ? $parame[0] : '';
		echo "</br> mostrar usuario: ". $parametros. " </br>";


		$usuario = new Usuario();
		$usuario->get($parametros);
		echo "Estado: " . $usuario->msj . " </br>";
		// echo "Id: " . $usuario->id . " </br>";
		echo "Nombre: " . $usuario->nombre . " </br>";
		echo "Apellido: " . $usuario->apellido . " </br>";
		echo "Telefono: " . $usuario->telefono . " </br>";
		echo "email: " . $usuario->email . " </br>";
		// echo "Clave: " . $usuario->clave . " </br>";


	}

	public function ingresar($parametros='') { // Recibe un array con los los parametros indefinidos

		// Seccion de validacion Parametros --> HACER un HELPER
		$datos = $parametros;

		//print_r($datos);
		echo 'parametros recibidos: <br/>';
		echo $datos[0] . "<br/>";
		
		
		echo "Insertando";
	}

	private function validad_datos($datos) {
		if ($datos != null) {
			$datos = 1;
		} else {
			$datos = "email/";
		}
	
	}

	// METODO DE PRUEBA
	public function mostrar2($parame="nao@mail.com") {
		$usuario = new Usuario();
		$usuario->get($parame);
		echo json_encode($usuario); // No seria recomendable enviar todo el objeto, o ocultar datos (verificar con private)
		header('Content-type: application/json');
		header("Access-Control-Allow-Origin: *");

		// echo "Nombre: " . $usuario->nombre . " | email: " . $usuario->email;

	}

	// METODO DE PRUEBA
	public function listar() {  // Enviara a la vista para generar JSON
		$datos = array( // Simula la query
			array(
				'id' => 1,
				'nombre' => 'Silvana',
				'email' => 'silvana@mail.com'
			),
			array(
				'id' => 2,
				'nombre' => 'Melisa',
				'email' => 'meilisa@mail.com'
			),
			array(
				'id' => 3,
				'nombre' => 'Emanuel',
				'email' => 'emanuel@mail.com'
			)
		);
	
	echo json_encode($datos);  // Codifica los datos en JSON

	}
}

?>