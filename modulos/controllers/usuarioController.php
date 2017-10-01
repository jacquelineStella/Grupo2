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

class UsuarioController {

	// array = ('nombre' => '', email' => 'usuario@mail.com', 'clave' = 'hash md5')
	public function iniciar($datos='') {
		
		$array = $this->formatear_array($datos);  // sino esta completo, retorna una array con '-'
			

		$usuario = new Usuario();
		$usuario->get($array['email']);
		if ($usuario->msj = "Existe" && $usuario->clave == $array['clave']) {
			// Retornar una clave que sera almacenada en el cliente
			// clave hash de email + 
			//Logueo correcto";
			//echo $usuario->email;
			echo json_encode($usuario);
		} else {

			echo json_encode(array());
		}
		

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
		$this->formatear_array($campos);
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
		// formateo del array: $campos= array('nombre' => 'pepito',
		//										'apellido' => 'pepe',
		//										'email' => 'pepito@pepelandia.com',
		//										'telefono' => '1122334455'
		//										'clave' => '12jkajdajhuhdauishdahsduasuui1'
		

	public function formatear_array($array='') {
		if(is_array($array) && count($array) > 4) {
			$campos = array('nombre', 'apellido', 'email', 'telefono', 'clave');
			$array_formateado = array();
			foreach ($campos as $key => $value) {
				$array_formateado[$value] = $array[$key];
			}
			
		}else {  // Si no tiene todos los campos
			
			$array_formateado = array('nombre'=> '-', 'apellido' => '-', 'email' => '-', 'telefono' => '-', 'clave' => '-');
		}
		return $array_formateado;
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



	// METODO DE PRUEBA
	public function mostrar2($parame) {
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