<?php

require('../../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();

if(isset($_POST["puestito"])&&!empty($_POST["puestito"])){
    $puestito=$_POST["puestito"];
}
else{
    $puestito="Jefe de Recursos Humanos";
}
$query='select pago from tbpuestos where nombre="'.$puestito.'"';
if($querySQL=mysqli_query($con->conect(),$query)){
    $res=mysqli_fetch_assoc($querySQL);
    $arr["0"]=utf8_encode($res["pago"]);
}

echo json_encode($arr,JSON_FORCE_OBJECT);

?>