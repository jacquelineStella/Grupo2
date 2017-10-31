<?php
require_once('core/handler.php');
require_once('config.php');
/* 
	CONTROLADOR FRONTAL
	-------------------

 	Maneja las peticiones del usuario y hace la llamada al controlador
	correspondiente.


	A qué módulo de la aplicación desea acceder el usuario
	• A qué modelo hace referencia
	• Qué recurso se está solicitando
	• y, si se le están enviando parámetros (argumentos) a dicho recurso

	1- Llama al Handler para obtener las peticiones solicitadas por el usuario y sus argumentos si fueron enviados
	2- Busca el controlador solicitado y lo importa
	– Llamar al controlador y enviarle la petición (recurso) y los argumentos
*/

$datos = obtener_uri();
$controlador = $datos[0];
$metodo = $datos[1];
$parametro = $datos[2];

/*
		echo "---------------------------------------</br> ";
		echo $"controlador;"
		echo "</br> metodo: " . $metodo;
		echo "</br> parametro: " .$parametro . "</br>";
		echo "---------------------------------------</br> ";

*/
// Define que controlador cargar
// Define la ruta donde estan los controladores
$path = CONTROLADORES . $controlador . ".php";
// echo "</br> Path: " . $path . "</br>";
// restricciones

if(file_exists($path)){

	require $path;
	$controlador = new $controlador();

	if(isset($metodo)){
		if(method_exists($controlador, $metodo)){
			if(isset($parametro) && $parametro != null){
				$controlador->{$metodo}($parametro);
			}else{
				$controlador->{$metodo}();
			}			
		}else{
			// Retorna un JSON con parametros vacios
			exit("Metodo invalido");
		}
	}
}else{
	exit("controlador Invalido");
}

?>