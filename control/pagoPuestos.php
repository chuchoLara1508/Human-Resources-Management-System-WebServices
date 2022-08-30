<?php

require('../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();

if(isset($_GET["puestito"])&&!empty($_GET["puestito"])){
    $puestito=$_GET["puestito"];
}
$query='select pago from tbpuestos where nombre="'.$puestito.'"';
if($querySQL=mysqli_query($con->conect(),$query)){
    $res=mysqli_fetch_assoc($querySQL);
    $arr["0"]=utf8_encode($res["pago"]);
    array_push($arregloFinal,$arr);
}

echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>