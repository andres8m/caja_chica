<?php
/**
 * Created by PhpStorm.
 * User: Andres Canu
 * Date: 29/01/2018
 * Time: 11:45 PM
 */

$conexion=mysqli_connect('localhost','root','','php_db');

$doc_id =  $_GET['link'];

$sql="DELETE FROM detalle_caja_chica  WHERE id='$doc_id'";
//$result = ejecutarConsulta($sql, $conexion);

echo ejecutarConsulta($sql, $conexion);

function ejecutarConsulta($sql, $conexion)
{
    $query = $conexion->query($sql);
    return $query;
}

?>