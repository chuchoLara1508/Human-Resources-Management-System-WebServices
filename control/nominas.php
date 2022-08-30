<?php
require('../modelo/CConexion.php');
$entregado=file_get_contents("php://input");
$con= new CConexion('root','localhost','','recursos_humanos');
$datos=json_decode($entregado);
$arreglo=array();
$arregloFinal=array();
$palabra="";
$query='select * from tbnominas';

if(isset($datos->{"palabra"})&&!empty($datos->{"palabra"})){ 
    $palabra=$datos->{"palabra"};
    $query.=' where (nombre like("%'.$palabra.'%") or puesto like("%'.$palabra.'%") or incapacidad like("%'.$palabra.'%"))';
}

if($querySQL=mysqli_query($con->conect(),$query)){
    $n=0;
    while($res=mysqli_fetch_assoc($querySQL)){
        $arreglo["0"]=array();
        $arreglo["0"]=$res["clave"];
        $arreglo["1"]=array();
        $arreglo["1"]=$res["clave_empleado"];
        $arreglo["2"]=array();
        $arreglo["2"]=$res["nombre"];
        $arreglo["3"]=array();
        $arreglo["3"]=$res["puesto"];
        $arreglo["4"]=array();
        $arreglo["4"]=$res["fecha_inicio"];
        $arreglo["5"]=array();
        $arreglo["5"]=$res["fecha_fin"];
        $arreglo["6"]=array();
        $arreglo["6"]=$res["fecha_pago"];
        $arreglo["7"]=array();
        $arreglo["7"]=$res["horas"];
        $arreglo["8"]=array();
        $arreglo["8"]=$res["incapacidad"];
        $arreglo["9"]=array();
        $arreglo["9"]=$res["dias"];
        $arreglo["10"]=array();
        $arreglo["10"]=$res["descISR"];
        $arreglo["11"]=array();
        $arreglo["11"]=$res["descIMSS"];
        $arreglo["12"]=array();
        $arreglo["12"]=$res["descInc"];
        $arreglo["13"]=array();
        $arreglo["13"]=$res["pago_dia"];
        $arreglo["14"]=array();
        $arreglo["14"]=$res["pago_hora"];
        $arreglo["15"]=array();
        $arreglo["15"]=$res["total_desc"];
        $arreglo["16"]=array();
        $arreglo["16"]=$res["total_horas"];
        $arreglo["17"]=array();
        $arreglo["17"]=$res["total_dias"];
        $arreglo["18"]=array();
        $arreglo["18"]=$res["total"];
        array_push($arregloFinal,$arreglo);
        $n++; 
    }

}
echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>