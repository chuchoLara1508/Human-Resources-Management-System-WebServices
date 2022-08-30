<?php

require('../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();

if(isset($_GET["clvmodulo"])&&!empty($_GET["clvmodulo"])){
    $clvmodulo=$_GET["clvmodulo"];
}
$query='select count(*) as total from tbrolespermisos where clave_modulo="'.$clvmodulo.'"';
if($querySQL=mysqli_query($con->conect(),$query)){
    $res=mysqli_fetch_assoc($querySQL);
    $arr["0"]=utf8_encode($res["total"]);
    array_push($arregloFinal,$arr);
}
echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>