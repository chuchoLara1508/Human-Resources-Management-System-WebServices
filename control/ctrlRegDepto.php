<?php 

include('../modelo/CConexion.php');

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

    $query='insert into tbdepartamentos (clave,nombre,descripcion) values ("'.$clave.'","'.$nombre.'","'.$descripcion.'")';
    if(mysqli_query($con->conect(),$query)){
        echo 'Departamento registrado exitosamente';
    }
    else{
        echo 'Error al registrar';
    }
}
else{
    echo 'campos insufucientes';
}

?>