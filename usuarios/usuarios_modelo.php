<?php
require_once('../core/db_abstract_model.php');

class Usuario extends DBAbstracModel {
	// Atributos
	public $nombre;
	public $email;
	// public $telefono;
	private $clave;
	protected $id;
	protected $permiso;  // verificar si deberia ser privada o protegiada...

	// constructor de la clase, indica a la base dentro del servidor que accedemos
	function __construct() {
		$this->db_name = 'apppet';
	}
	

	public function get($usuario_email = '') {
		if($usuario_email != '') {
			$this->query = "
				SELECT 	id_usuario, nombre, clave, email, permiso
				FROM 	usuario
				WHERE 	email = '$usuario_email'

			";
			$this->obtener_resultados();

		}

		if(count($this->rows) == 1) {
			foreach ($this->rows[0] as $propiedad => $valor) {
				$this->$propiedad = $valor;
			}
		}

	}

	public function set($datos_usuario=array()) {
		if(array_key_exists('email', $datos_usuario)) {
			$this->get($datos_usuario['email']);
			if($datos_usuario['email'] != $this->email){
				foreach ($datos_usuario as $campo => $valor) {
					$$campo = $valor;
				}
				$this->query = "
					INSERT INTO 	usuario(nombre, email, clave, permiso)
					VALUES 			('$nombre', '$email', '$clave', '$permiso')
				";
				$this->consulta_simple();
			}
		}
	}

	public function edit($datos_usuario=array()) {
		foreach ($datos_usuario as $campo => $valor) {
			$$campo = $valor;
		}
		$this->query = "
			UPDATE 		usuario
			SET 		nombre='$nombre', email='$email', clave='$clave', permiso='$permiso'
			WHERE 		email = '$email'
		";
		$this->consulta_simple();
	}

	public function delete($usuario_email='') {
		$this->query = "
			DELETE FROM 	Usuario
			WHERE 			email = '$usuario_email'
		";
		$this->consulta_simple();
	}

	function __destruct() {
		unset($this);
	}


}


?>