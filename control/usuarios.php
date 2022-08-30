<?php
require('../modelo/CConexion.php');
$entregado=file_get_contents("php://input");
$con= new CConexion('root','localhost','','recursos_humanos');
$datos=json_decode($entregado);
$arreglo=array();
$arregloFinal=array();
$palabra="";
$query='select * from tbusuarios';

if(isset($datos->{"palabra"})&&!empty($datos->{"palabra"})){ 
    $palabra=$datos->{"palabra"};
    $query.=' where (nombre like("%'.$palabra.'%") or usuario like("%'.$palabra.'%") or correo like("%'.$palabra.'%"))';
}

if($querySQL=mysqli_query($con->conect(),$query)){
    $n=0;
    while($res=mysqli_fetch_assoc($querySQL)){
        $arreglo["0"]=array();
        $arreglo["0"]=$res["clave"];
        $arreglo["1"]=array();
        $arreglo["1"]=$res["clave_rol"];
        $arreglo["2"]=array();
        $arreglo["2"]=$res["nombre"];
        $arreglo["3"]=array();
        $arreglo["3"]=$res["usuario"];
        $arreglo["4"]=array();
        $arreglo["4"]=$res["contra"];
        $arreglo["5"] = array();
        $arreglo["5"] = $res["correo"];
        $arreglo["6"] = array();
        $arreglo["6"] = $res["clave_empleado"];
        array_push($arregloFinal,$arreglo);
        $n++; 
    }

}
echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>