<?php 
	$conexion=mysqli_connect('localhost','root','','php_db');

	
	$type = $_POST['selectDocType'];
	$value = $_POST['valorDinero'];
	$note = $_POST['notaDesc'];
//	$date=$_POST['documentDate'];
	$id_caja_chica=$_POST['id_caja_chica'];
/*	$password=sha1($_POST['password']); */

	$sql="INSERT into detalle_caja_chica (tipo_documento, valor_documento,nota,date,id_caja_chica)
			values ('$type','$value','$note',now(),'$id_caja_chica')";

	echo mysqli_query($conexion,$sql) or trigger_error($conexion->error);






?>


