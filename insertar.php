<?php

$conexion=mysqli_connect('localhost','root','','php_db');


$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$value = $request->value;

	$sql="INSERT into caja_chica (fecha_hora, valor_inicial)
			values (now(),'$value')";


    $idCaja=ejecutarConsulta_retornarID($sql,$conexion);

        echo $idCaja;


function ejecutarConsulta_retornarID($sql, $conexion)
{
    $query = $conexion->query($sql);
    return $conexion->insert_id;
}



 ?>