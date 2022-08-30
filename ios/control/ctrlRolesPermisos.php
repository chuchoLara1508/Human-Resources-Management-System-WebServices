<?php

require('../../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arreglo=array();
$arregloFinal=array();
$roles=array("CEa!h","bXODv","sqYu9");
$modulos=array();
$query='select * from tbrolespermisos';
if(isset($_POST["rol"])&&isset($_POST["modulo"])){
    if($_POST["rol"]>0){
        if($_POST["rol"]==1){
            $query.=' where clave_rol="CEa!h"';
        }
        if($_POST["rol"]=="2"){
            $query.=' where clave_rol="bXODv"';
        }
        if($_POST["rol"]==3){
            $query.=' where clave_rol="sqYu9"';
        }
        if($_POST["modulo"]>0){
            $query.=' and';
            if($_POST["modulo"]==1){
                $query.=' clave_modulo="PMoXu"';
            }
            if($_POST["modulo"]=="2"){
                $query.=' clave_modulo="Ptd_5"';
            }
            if($_POST["modulo"]==3){
                $query.=' clave_modulo="U7FKX"';
            }
            if($_POST["modulo"]==4){
                $query.=' clave_modulo="XwPQA"';
            }
            if($_POST["modulo"]==5){
                $query.=' clave_modulo="mtkkj"';
            }
            if($_POST["modulo"]==6){
                $query.=' clave_modulo="rJBwL"';
            }
        }
    }
    else if($_POST["modulo"]>0){
        if($_POST["modulo"]==1){
            $query.=' where clave_modulo="PMoXu"';
        }
        if($_POST["modulo"]=="2"){
            $query.=' where clave_modulo="Ptd_5"';
        }
        if($_POST["modulo"]==3){
            $query.=' where clave_modulo="U7FKX"';
        }
        if($_POST["modulo"]==4){
            $query.=' where clave_modulo="XwPQA"';
        }
        if($_POST["modulo"]==5){
            $query.=' where clave_modulo="mtkkj"';
        }
        if($_POST["modulo"]==6){
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
        $arreglo["clave"]=array();
        $arreglo["clave"]=$res["clave"];
        $arreglo["clave_rol"]=array();
        $arreglo["clave_rol"]=$res["clave_rol"];
        $arreglo["clave_modulo"]=array();
        $arreglo["clave_modulo"]=$res["clave_modulo"];
        $arreglo["guardar"]=array();
        $arreglo["guardar"]=$res["guardar"];
        $arreglo["editar"]=array();
        $arreglo["editar"]=$res["actualizar"];
        $arreglo["eliminar"]=array();
        $arreglo["eliminar"]=$res["eliminar"];
        array_push($arregloFinal,$arreglo);
        $n++;
    }
    //echo "prueba: ".json_encode($arregloFinal["0"]["clave"]);
}

for($i=0;$i<count($arregloFinal);$i++) {
    //modificar roles
    if($arregloFinal["$i"]["clave_rol"]=="sqYu9"){
        $arregloFinal["$i"]["clave_rol"]="Empleado de RH";
    }
    if($arregloFinal["$i"]["clave_rol"]=="CEa!h"){
        $arregloFinal["$i"]["clave_rol"]="SuperAdministrador de RH";
    }
    if($arregloFinal["$i"]["clave_rol"]=="bXODv"){
        $arregloFinal["$i"]["clave_rol"]="Administrador de RH";
    }
    //modificar modulos
    if($arregloFinal["$i"]["clave_modulo"]=="PMoXu"){
        $arregloFinal["$i"]["clave_modulo"]="Puestos";
    }
    if($arregloFinal["$i"]["clave_modulo"]=="Ptd_5"){
        $arregloFinal["$i"]["clave_modulo"]="Nóminas";
    }
    if($arregloFinal["$i"]["clave_modulo"]=="U7FKX"){
        $arregloFinal["$i"]["clave_modulo"]="Departamentos";
    }
    if($arregloFinal["$i"]["clave_modulo"]=="XwPQA"){
        $arregloFinal["$i"]["clave_modulo"]="Usuarios";
    }
    if($arregloFinal["$i"]["clave_modulo"]=="mtkkj"){
        $arregloFinal["$i"]["clave_modulo"]="Empleados";
    }
    if($arregloFinal["$i"]["clave_modulo"]=="rJBwL"){
        $arregloFinal["$i"]["clave_modulo"]="Incapacidades";
    }
}

echo json_encode($arregloFinal);


?>