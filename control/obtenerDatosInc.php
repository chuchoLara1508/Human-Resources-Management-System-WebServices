<?php

require('../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();

if(isset($_GET["clave"])&&!empty($_GET["clave"])){
    $clave=$_GET["clave"];
}

$query='select * from tbincapacidades where clave="'.$clave.'"';
if($querySQL=mysqli_query($con->conect(),$query)){
    $res=mysqli_fetch_assoc($querySQL);
    $arr["0"]=$res["nombre"];
    $arr["1"]=$res["descuento"];
    array_push($arregloFinal,$arr);
}
echo json_encode($arregloFinal,JSON_FORCE_OBJECT);
?>