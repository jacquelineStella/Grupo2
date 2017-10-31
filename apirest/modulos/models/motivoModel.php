<?php
require_once('./core/db_abstract_model.php');

class Motivo extends DBAbstracModel {
	// Atributos
	public $id_motivo;
	public $descripcion;


	function __construct() {
		$this->db_name = 'thepetfriends';
	}


	public function get($id = '') {
		if($id != '') {

			$where = ($id > 0) ? "id_motivo = " . $id : "1";
			echo $where . "<br/>";
			$this->query = "
				SELECT id_motivo, descripcion
				FROM motivo
				WHERE id_motivo = '$id'
			";
		} //id_motivo = '$id'
		$this->obtener_resultados();

		if(count($this->rows) == 1) {
			foreach ($this->rows[0] as $propiedad => $valor) {
				$this->$propiedad = $valor;
			}
			$this->msj = 'encontrado';
		} else {
			print_r($this->rows);
			$this->msj = 'no encontrado';
		}
	}


	public function set($datos_array = array()) {
		if(array_key_exists('descripcion', $datos_array)) {
			$descripcion = $datos_array['descripcion'];
			$this->query = "
				INSERT INTO 	motivo (descripcion)
					VALUES 		('$descripcion');
				";

			$this->consulta_simple();
				//$this->msj = 'motivo agregado';
			
		}
	}

	public function edit($dato = ''){
		//
	}


	public function delete(){
		//
	}

}

?>