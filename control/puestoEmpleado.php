<?php 

require('../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();

if(isset($_GET["clv"])&&!empty($_GET["clv"])){
    $clave=$_GET["clv"];
}

$query='select puesto from tbempleados where clave="'.$clave.'"';
if($querySQL=mysqli_query($con->conect(),$query)){
    $res=mysqli_fetch_assoc($querySQL);
    $arr["0"]=utf8_encode($res["puesto"]);
    array_push($arregloFinal,$arr);
}

echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>