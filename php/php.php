<?php
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];

	$para = 'lic.felipefr@hotmail.com';
	$titulo = 'The Beer Fans - Registro';
	$mensaje = 'Nombre: '.$nombre.' E-mail: '. $email.'.';

	mail($para, $titulo, $mensaje);

	header("Location: ../html/inicio_esp.php");
?>