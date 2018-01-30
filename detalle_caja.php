<?php

$conexion=mysqli_connect('localhost','root','','php_db');

$caja_id =  $_GET['link'];

//echo $postdata;

//$postdata = file_get_contents("php://input");
//$request = json_decode($postdata);
//@$email = $request->myData;
//
//echo json_encode($email); //this will go back under "data" of angular call.


//PHP Script: receive_from_angularjs.php

//$from_angular = json_decode( file_get_contents('php://input') );
//$myData = $from_angular->myData;
//
//echo $myData;

//$obj = $_POST['myData'];
//$data = json_decode(file_get_contents("php://input"));

//echo $data[0]; // to access name

//echo $data[0]['myData'];
//$jsondata = $_POST['myData'];
//$jsondata = stripslashes($jsondata);
//$data = json_decode($jsondata,true);
//
$sql = "SELECT * FROM detalle_caja_chica WHERE id_caja_chica='$caja_id'";
$result = ejecutarConsulta($sql, $conexion);

//header('Content-Type: application/json');
//create an array

$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
    $emparray[] = $row;
}

//
echo json_encode($emparray);



function ejecutarConsulta($sql, $conexion)
{
    $query = $conexion->query($sql);
    return $query;
}

?>