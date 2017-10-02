<?php 
/* 	
If you see this text in your browser, PHP is not configured correctly on this hosting provider. 
Contact your hosting provider regarding PHP configuration for your site.

PHP file generated by Adobe Muse CC 2017.1.0.379
*/

require_once('form_process.php');

$form = array(
	'subject' => 'Envío de Formulario Mascotas',
	'heading' => 'Envío de nuevo formulario',
	'success_redirect' => '',
	'resources' => array(
		'checkbox_checked' => 'Marcada',
		'checkbox_unchecked' => 'No marcada',
		'submitted_from' => 'Formulario enviado desde el sitio web: %s',
		'submitted_by' => 'Dirección IP del visitante: %s',
		'too_many_submissions' => 'Se han realizado recientemente demasiados envíos a través de esta IP',
		'failed_to_send_email' => 'Error al enviar el correo electrónico',
		'invalid_reCAPTCHA_private_key' => 'Clave privada de reCAPTCHA no válida.',
		'invalid_reCAPTCHA2_private_key' => 'Clave privada de reCAPTCHA 2.0 no válida.',
		'invalid_reCAPTCHA2_server_response' => 'Respuesta de servidor de reCAPTCHA 2.0 no válida.',
		'invalid_field_type' => 'Tipo de campo desconocido: %s.',
		'invalid_form_config' => 'El campo \'%s\' contiene una configuración no válida.',
		'unknown_method' => 'Método de solicitud de servidor desconocido'
	),
	'email' => array(
		'from' => 'nadir.guiffre@gmail.com',
		'to' => 'nadir.guiffre@gmail.com'
	),
	'fields' => array(
		'custom_U682' => array(
			'order' => 1,
			'type' => 'string',
			'label' => 'Nombre',
			'required' => true,
			'errors' => array(
				'required' => 'El campo \'Nombre\' es obligatorio.'
			)
		),
		'custom_U670' => array(
			'order' => 2,
			'type' => 'string',
			'label' => 'Sexo',
			'required' => true,
			'errors' => array(
				'required' => 'El campo \'Sexo\' es obligatorio.'
			)
		),
		'custom_U655' => array(
			'order' => 3,
			'type' => 'string',
			'label' => 'Dirección',
			'required' => true,
			'errors' => array(
				'required' => 'El campo \'Dirección\' es obligatorio.'
			)
		),
		'custom_U659' => array(
			'order' => 4,
			'type' => 'string',
			'label' => 'Ciudad',
			'required' => true,
			'errors' => array(
				'required' => 'El campo \'Ciudad\' es obligatorio.'
			)
		),
		'custom_U674' => array(
			'order' => 5,
			'type' => 'string',
			'label' => 'Región',
			'required' => true,
			'errors' => array(
				'required' => 'El campo \'Región\' es obligatorio.'
			)
		),
		'custom_U686' => array(
			'order' => 6,
			'type' => 'string',
			'label' => 'Descripción',
			'required' => true,
			'errors' => array(
				'required' => 'El campo \'Descripción\' es obligatorio.'
			)
		),
		'custom_U863' => array(
			'order' => 7,
			'type' => 'radiogroup',
			'label' => 'Motivo',
			'required' => true,
			'optionItems' => array(
				'Adopción',
				'Perdida',
				'Para pareja'
			),
			'errors' => array(
				'required' => 'El campo \'Motivo\' es obligatorio.',
				'format' => 'El campo \'Motivo\' contiene un valor no válido.'
			)
		)
	)
);

process_form($form);
?>