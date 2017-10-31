<?php
require_once('./core/db_abstract_model.php');

class Usuario extends DBAbstracModel {
	// Atributos
	protected $id;
	public $nombre;
	public $apellido;
	public $email;
	public $telefono;
	public $clave;
	
	// protected $permiso;  // verificar si deberia ser privada o protegiada...
	// Por el momento no se tendra en cuenta otros roles

	// constructor de la clase, indica a la base dentro del servidor que accedemos
	function __construct() {
		$this->db_name = 'nueva_thepetfriends_v2';
	}
	

	public function get($usuario_email = '') {
		if($usuario_email != '') {
			$this->query = "
				SELECT 	id_usuario, nombre, apellido, email, telefono, clave
				FROM 	usuario
				WHERE 	email = '$usuario_email'

			";
			$this->obtener_resultados();

		}

		if(count($this->rows) == 1) {
			foreach ($this->rows[0] as $propiedad => $valor) {
				$this->$propiedad = $valor;
			}
			$this->msj = 'Existe';
		} else {
			$this->msj = 'No existe';
		}

	}

	public function set($datos_usuario=array()) {
		if(array_key_exists('email', $datos_usuario)) {
			$this->get($datos_usuario['email']);
			if($datos_usuario['email'] != $this->email){
				foreach ($datos_usuario as $campo => $valor) {
					$$campo = $valor;
				}
				echo "<br> nombre: " . $nombre . "| apellido: " . $apellido . "| email: " . $email .
						"| telefono: " . $telefono . "| clave: " . $clave . "<br>";
				$this->query = "
					INSERT INTO 	usuario (id_usuario, nombre, apellido, email, telefono, clave)
					VALUES 			('null','$nombre', '$apellido', '$email', '$telefono', '$clave')
				";
				
				$this->consulta_simple();
				$this->msj = 'Usuario agregado';
			} else{
				$this->msj = 'El usuario ya existe';
			}
		}
	}


	public function edit($datos_usuario=array()) {
		foreach ($datos_usuario as $campo => $valor) {
			$$campo = $valor;
		}
		$this->query = "
			UPDATE 		usuario
			SET 		nombre='$nombre', apellido='$apellido' email='$email', telefono='$telefono' clave='$clave'
			WHERE 		email = '$email'
		";
		$this->consulta_simple();
		$this->msj = 'usuario modificado';
	}

	public function delete($usuario_email='') {
		$this->query = "
			DELETE FROM 	usuario
			WHERE 			email = '$usuario_email'
		";
		$this->consulta_simple();
		$this->msj = 'Usuario eliminado';
	}

	function __destruct() {
		// unset($this);
	}


}


?>