<?php 

require('../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$clvRol="";
$arregloFinal=array();
if(isset($_GET["clave"])&&!empty($_GET["clave"])){
    $clave=$_GET["clave"];
}
$obtenido="";
$query='select clave_rol from tbrolespermisos where clave="'.$clave.'"';
if($resultado=mysqli_query($con->conect(),$query)){
    $res=mysqli_fetch_assoc($resultado);
    $obtenido=$res["clave_rol"];
    $query1='select nombre from roles where clave="'.$obtenido.'"';
    if($result1=mysqli_query($con->conect(),$query1)){
        $res1=mysqli_fetch_assoc($result1);
        $arr["0"]=$res1["nombre"];
    }
    array_push($arregloFinal,$arr);
}
echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>