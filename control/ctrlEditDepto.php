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

    $query='update tbdepartamentos set nombre="'.$nombre.'",descripcion="'.$descripcion.'" where clave="'.$clave.'"';
    if(mysqli_query($con->conect(),$query)){
        echo 'Edición exitosa!';
    }
    else{
        echo 'Error al editar';
    }
}
else{
    echo 'campos insufucientes';
}

?>