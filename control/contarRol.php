<?php

require('../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();
if(isset($_GET["clvrol"])&&!empty($_GET["clvrol"])){
    $clvRol=$_GET["clvrol"];
}
$query='select count(*) as total from tbrolespermisos where clave_rol="'.$clvRol.'"';
if($querySQL=mysqli_query($con->conect(),$query)){
    $res=mysqli_fetch_assoc($querySQL);
    $arr["0"]=utf8_encode($res["total"]);
    array_push($arregloFinal,$arr);
}
echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>