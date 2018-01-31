<?php
//receive data from AJAX request and decode
$conexion=mysqli_connect('localhost','root','','php_db');
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


$type = $request->type;
$value = $request->value;
$note = $request->note;
$id_caja_chica = $request->idCash;

$sql="INSERT into detalle_caja_chica (tipo_documento, valor_documento,nota,date,id_caja_chica)
			values ('$type','$value','$note',now(),'$id_caja_chica')";

echo mysqli_query($conexion,$sql) or trigger_error($conexion->error);

//echo json_encode( array(
//    'xxx' => $email
//) );