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
    $query='update tbincapacidades set nombre="'.$nombre.'",descuento='.$descuento.' where clave="'.$clave.'"';
    if(mysqli_query($con->conect(),$query)){    
        echo 'Edición exitosa';
    }
    else{
        echo 'Error al editar';
    }
}
else{
    echo 'Campos insuficientes';
}

?>