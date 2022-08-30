<?php

include('../modelo/CConexion.php');

$con= new CConexion("root","localhost","","recursos_humanos");

if(isset($_POST["clave"])&&!empty($_POST["clave"])
    &&
    (isset($_POST["nombre"])&&!empty($_POST["nombre"]))
    &&
    (isset($_POST["descuento"])&&!empty($_POST["descuento"]))
){
    $clave=$_POST["clave"];
    $nombre=$_POST["nombre"];
    $descuento=$_POST["descuento"];
    $query='insert into tbincapacidades (clave,nombre,descuento) values("'.$clave.'","'.$nombre.'",'.$descuento.')';
    if(mysqli_query($con->conect(),$query)){    
        echo 'Incapacidad registrada exitosamente';
    }
    else{
        echo 'Error al registrar';
    }
}

?>