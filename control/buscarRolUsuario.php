<?php 

require('../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();
if(isset($_GET["usuario"])&&!empty($_GET["usuario"])){
    $usuario=$_GET["usuario"];
}

$query='select clave_rol from tbusuarios where usuario="'.$usuario.'"';

if($querySQL=mysqli_query($con->conect(),$query)){
    $res=mysqli_fetch_assoc($querySQL);
    $arr["0"]=$res["clave_rol"];
    array_push($arregloFinal,$arr);
}

echo json_encode($arregloFinal,JSON_FORCE_OBJECT);


?>