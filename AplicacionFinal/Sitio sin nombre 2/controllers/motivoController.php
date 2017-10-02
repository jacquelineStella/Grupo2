<?php
//requiere_once(VISTAS . 'motivoView.php');
require_once(MODELOS . 'motivoModel.php');

class MotivoController {
	public function mostrar($dato = array()) {

		$p = (isset($dato[0]) &&  $dato != '') ? $dato[0] : '';
	
		$motivo =  new Motivo();
		$motivo->get($p);

		echo "Estado: " . $motivo->msj . "<br/>";
		echo "Descripcion: " . $motivo->descripcion;
	}

	public function guardar($dato = array()) {

		if(isset($dato[0])) {
			$array = array('descripcion' => $dato[0]);
			$motivo = new Motivo();
			$motivo->set($array);
		}
	}

}
?>