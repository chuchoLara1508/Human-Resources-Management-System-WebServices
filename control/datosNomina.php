<?php

require('../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();

if(isset($_GET["clave"])&&!empty($_GET["clave"])){
    $clave=$_GET["clave"];
}
$query='select * from tbnominas where clave="'.$clave.'"';
if($querySQL=mysqli_query($con->conect(),$query)){
    $res=mysqli_fetch_assoc($querySQL);
    $arr["0"]=$res["clave_empleado"];
    $arr["1"]=$res["nombre"];
    $arr["2"]=$res["fecha_inicio"];
    $arr["3"]=$res["fecha_fin"];
    $arr["4"]=$res["fecha_pago"];
    $arr["5"]=$res["horas"];
    $arr["6"]=$res["incapacidad"];
    $arr["7"]=$res["dias"];
    $arr["8"]=$res["descISR"];
    $arr["9"]=$res["descIMSS"];
    array_push($arregloFinal,$arr);
}
echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>