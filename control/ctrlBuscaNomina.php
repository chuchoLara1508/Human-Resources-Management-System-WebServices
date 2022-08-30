<?php
require('../modelo/CConexion.php');
if(isset($_GET["clave"])&&!empty($_GET["clave"])){
    $clave=$_GET["clave"];
}
$query='select * from tbnominas where clave="'.$clave.'"';
$arr=array();
$arregloFinal=array();
    $con= new CConexion('root','localhost','','recursos_humanos');
    if($querySQL=mysqli_query($con->conect(),$query)){
        $res=mysqli_fetch_assoc($querySQL);
        $arr["0"]=$res["clave"];
        $arr["1"]=$res["clave_empleado"];
        $arr["2"]=$res["nombre"];
        $arr["3"]=$res["puesto"];
        $arr["4"]=$res["fecha_inicio"];
        $arr["5"]=$res["fecha_fin"];
        $arr["6"]=$res["fecha_pago"];
        $arr["7"]=$res["horas"];
        $arr["8"]=$res["incapacidad"];
        $arr["9"]=$res["dias"];
        $arr["10"]=$res["descISR"];
        $arr["11"]=$res["descIMSS"];
        $arr["12"]=$res["descInc"];
        $arr["13"]=$res["pago_dia"];
        $arr["14"]=$res["pago_hora"];
        $arr["15"]=$res["total_desc"];
        $arr["16"]=$res["total_horas"];
        $arr["17"]=$res["total_dias"];
        $arr["18"]=$res["total"];
        array_push($arregloFinal,$arr);
    }

echo json_encode($arregloFinal,JSON_FORCE_OBJECT);


?>