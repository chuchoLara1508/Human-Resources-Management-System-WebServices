<?php

require('../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();

if(isset($_GET["clave"])&&!empty($_GET["clave"])){
    $clave=$_GET["clave"];
}
$query='select * from tbempleados where clave="'.$clave.'"';
if($querySQL=mysqli_query($con->conect(),$query)){
    $res=mysqli_fetch_assoc($querySQL);
    $arr["0"]=$res["nombre"];
    $arr["1"]=$res["numero"];
    $arr["2"]=$res["curp"];
    $arr["3"]=$res["rfc"];
    $arr["4"]=$res["direccion"];
    $arr["5"]=$res["numero_cuenta"];
    $arr["6"]=$res["puesto"];
    $arr["7"]=$res["fecha"];
    $arr["8"]=$res["nivel_escolar"];
    $arr["9"]=$res["genero"];
    $arr["10"]=$res["pais"];
    $arr["11"]=$res["clavepuesto"];
    $arr["12"]=$res["clavepais"];
    array_push($arregloFinal,$arr);
}
echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>