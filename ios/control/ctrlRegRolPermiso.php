<?php

include('../../modelo/CConexion.php');

$con= new CConexion("root","localhost","","recursos_humanos");

if(
    (isset($_POST["clave"])&&!empty($_POST["clave"]))
    &&
    (isset($_POST["clave_rol"])&&!empty($_POST["clave_rol"]))
    &&
    (isset($_POST["clave_modulo"])&&!empty($_POST["clave_modulo"]))
    &&
    (isset($_POST["guardar"])&&isset($_POST["actu"])&&isset($_POST["elimina"]))
){
    $clave=$_POST["clave"];
    $clave_rol = $_POST["clave_rol"];
    $clave_modulo = $_POST["clave_modulo"];
    $guardar = $_POST["guardar"];
    $actu = $_POST["actu"];
    $elimina = $_POST["elimina"];
    $query='insert into tbrolespermisos (clave,clave_rol,clave_modulo,guardar,actualizar,eliminar) values("'.$clave.'","'.$clave_rol.'","'.$clave_modulo.'",'.$guardar.','.$actu.','.$elimina.')';
    if(mysqli_query($con->conect(),$query)){    
        $arreglo["0"]=array();
        $arreglo["0"]="1";
    }
    echo json_encode($arreglo,JSON_FORCE_OBJECT);
}

?>