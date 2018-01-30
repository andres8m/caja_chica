<?php

$conexion=mysqli_connect('localhost','root','','php_db');


$sql = "SELECT id, valor_inicial, fecha_hora FROM caja_chica";
$result = ejecutarConsulta($sql, $conexion);

//header('Content-Type: application/json');
//create an array

$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
    $emparray[] = $row;
}


echo json_encode($emparray);



function ejecutarConsulta($sql, $conexion)
{
    $query = $conexion->query($sql);
    return $query;
}

?>