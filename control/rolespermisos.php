<?php

require('../modelo/CConexion.php');
$entregado=file_get_contents("php://input");
$con= new CConexion('root','localhost','','recursos_humanos');
$datos=json_decode($entregado);
$arreglo=array();
$arregloFinal=array();
$roles=array("CEa!h","bXODv","sqYu9");
$modulos=array();
$query='select * from tbrolespermisos';
if(isset($datos->{"rol"})&&isset($datos->{"modulo"})){
    if($datos->{"rol"}>0){
        if($datos->{"rol"}==1){
            $query.=' where clave_rol="CEa!h"';
        }
        if($datos->{"rol"}==2){
            $query.=' where clave_rol="bXODv"';
        }
        if($datos->{"rol"}==3){
            $query.=' where clave_rol="sqYu9"';
        }
        if($datos->{"modulo"}>0){
            $query.=' and';
            if($datos->{"modulo"}==1){
                $query.=' clave_modulo="PMoXu"';
            }
            if($datos->{"modulo"}==2){
                $query.=' clave_modulo="Ptd_5"';
            }
            if($datos->{"modulo"}==3){
                $query.=' clave_modulo="U7FKX"';
            }
            if($datos->{"modulo"}==4){
                $query.=' clave_modulo="XwPQA"';
            }
            if($datos->{"modulo"}==5){
                $query.=' clave_modulo="mtkkj"';
            }
            if($datos->{"modulo"}==6){
                $query.=' clave_modulo="rJBwL"';
            }
        }
    }
    else if($datos->{"modulo"}>0){
        if($datos->{"modulo"}==1){
            $query.=' where clave_modulo="PMoXu"';
        }
        if($datos->{"modulo"}==2){
            $query.=' where clave_modulo="Ptd_5"';
        }
        if($datos->{"modulo"}==3){
            $query.=' where clave_modulo="U7FKX"';
        }
        if($datos->{"modulo"}==4){
            $query.=' where clave_modulo="XwPQA"';
        }
        if($datos->{"modulo"}==5){
            $query.=' where clave_modulo="mtkkj"';
        }
        if($datos->{"modulo"}==6){
            $query.=' where clave_modulo="rJBwL"';
        }
    }

    $query.=' order by clave_modulo ASC';
}
else{
    $query.=' order by clave_modulo ASC';
}

if($querySQL=mysqli_query($con->conect(),$query)){
    $n=0;
    while($res=mysqli_fetch_assoc($querySQL)){
        $arreglo["0"]=array();
        $arreglo["0"]=$res["clave"];
        $arreglo["1"]=array();
        $arreglo["1"]=$res["clave_rol"];
        $arreglo["2"]=array();
        $arreglo["2"]=$res["clave_modulo"];
        $arreglo["3"]=array();
        $arreglo["3"]=$res["guardar"];
        $arreglo["4"]=array();
        $arreglo["4"]=$res["actualizar"];
        $arreglo["5"]=array();
        $arreglo["5"]=$res["eliminar"];
        array_push($arregloFinal,$arreglo);
        $n++;
    }
}
for($i=0;$i<count($arregloFinal);$i++) {
    //modificar roles
    if($arregloFinal[$i][1]=="sqYu9"){
        $arregloFinal[$i][1]="Empleado de RH";
    }
    if($arregloFinal[$i][1]=="CEa!h"){
        $arregloFinal[$i][1]="SuperAdministrador de RH";
    }
    if($arregloFinal[$i][1]=="bXODv"){
        $arregloFinal[$i][1]="Administrador de RH";
    }
    //modificar modulos
    if($arregloFinal[$i][2]=="PMoXu"){
        $arregloFinal[$i][2]="Puestos";
    }
    if($arregloFinal[$i][2]=="Ptd_5"){
        $arregloFinal[$i][2]="Nóminas";
    }
    if($arregloFinal[$i][2]=="U7FKX"){
        $arregloFinal[$i][2]="Departamentos";
    }
    if($arregloFinal[$i][2]=="XwPQA"){
        $arregloFinal[$i][2]="Usuarios";
    }
    if($arregloFinal[$i][2]=="mtkkj"){
        $arregloFinal[$i][2]="Empleados";
    }
    if($arregloFinal[$i][2]=="rJBwL"){
        $arregloFinal[$i][2]="Incapacidades";
    }
}

echo json_encode($arregloFinal,JSON_FORCE_OBJECT);


?>