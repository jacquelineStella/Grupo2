<?php
require_once('./core/db_abstract_model.php');

/**
* 
*/
class Motivo extends DBAbstracModel {
	// Atributos
	public $id_motivo;
	public $descripcion;


	function __construct() {
		$this->db_name = 'thepetfriends';
	}


	public function get($id = '') {
		if($id != '') {
			$this->query = "
				SELECT id_motivo, descripcion
				FROM motivo
				WHERE id_motivo = '$id'
			";
		}
		$this->obtener_resultados();

		if(count($this->rows) == 1) {
			foreach ($this->rows[0] as $propiedad => $valor) {
				$this->$propiedad = $valor;
			}
			$this->msj = 'encontrado';
		} else {
			$this->msj = 'no encontrado';
		}
	}


	public function set($datos_array = array()) {
		if(array_key_exists('descripcion', $datos_array)) {
			$descripcion = $datos_array[0];
			$this->query = "
				INSERT INTO 	motivo (descripcion)
					VALUES 		('$descripcion')
				";
				
				$this->consulta_simple();
				$this->msj = 'motivo agregado';
		}


	public function edit($dato = ''){
		//
	}


	public function delete(){
		//
	}

}

?>