<?php
require('../../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arreglo=array();
$arregloFinal=array();
$palabra="";
$query='select * from tbempleados';

if($querySQL=mysqli_query($con->conect(),$query)){
    $n=0;
    while($res=mysqli_fetch_assoc($querySQL)){
        $arreglo["0"]=array();
        $arreglo["0"]=$res["clave"];
        $arreglo["1"]=array();
        $arreglo["1"]=$res["nombre"];
        $arreglo["2"]=array();
        $arreglo["2"]=$res["numero"];
        $arreglo["3"]=array();
        $arreglo["3"]=$res["curp"];
        $arreglo["4"]=array();
        $arreglo["4"]=$res["rfc"];
        $arreglo["5"]=array();
        $arreglo["5"]=$res["direccion"];
        $arreglo["6"]=array();
        $arreglo["6"]=$res["numero_cuenta"];
        $arreglo["7"]=array();
        $arreglo["7"]=$res["puesto"];
        $arreglo["8"]=array();
        $arreglo["8"]=$res["fecha"];
        $arreglo["9"]=array();
        $arreglo["9"]=$res["nivel_escolar"];
        $arreglo["10"]=array();
        $arreglo["10"]=$res["genero"];
        $arreglo["11"]=array();
        $arreglo["11"]=$res["pais"];
        $arreglo["12"]=array();
        $arreglo["12"]=$res["clavepuesto"];
        $arreglo["13"]=array();
        $arreglo["13"]=$res["clavepais"];
        array_push($arregloFinal,$arreglo);
        $n++; 
    }

}
echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>