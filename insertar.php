<?php

$conexion=mysqli_connect('localhost','root','','php_db');

	$valueQ = $_POST['initialValue'];

	$sql="INSERT into caja_chica (fecha_hora, valor_inicial)
			values (now(),'$valueQ')";


    $idCaja=ejecutarConsulta_retornarID($sql,$conexion);

        echo $idCaja;


function ejecutarConsulta_retornarID($sql, $conexion)
{
    $query = $conexion->query($sql);
    return $conexion->insert_id;
}



 ?>