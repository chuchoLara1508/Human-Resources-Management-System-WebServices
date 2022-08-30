<?php 

include('../../modelo/CConexion.php');

$con= new CConexion("root","localhost","","recursos_humanos");

if(
    (isset($_POST["clave"])&&!empty($_POST["clave"]))
    &&
    (isset($_POST["nombre"])&&!empty($_POST["nombre"]))
    &&
    isset($_POST["descripcion"])
){
    $clave=$_POST["clave"];
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $arreglo=array();
    $query='insert into tbdepartamentos (clave,nombre,descripcion) values ("'.$clave.'","'.$nombre.'","'.$descripcion.'")';
    if(mysqli_query($con->conect(),$query)){
        $arreglo["0"]=array();
        $arreglo["0"]="1";
    }
    echo json_encode($arreglo,JSON_FORCE_OBJECT);
}


?>