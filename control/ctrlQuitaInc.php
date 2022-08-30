<?php

include('../modelo/CConexion.php');

$con= new CConexion("root","localhost","","recursos_humanos");

if(isset($_POST["clave"])&&!empty($_POST["clave"])){
    $clave=$_POST["clave"];
    $query='delete from tbincapacidades where clave="'.$clave.'"';
    if(mysqli_query($con->conect(),$query)){    
        echo 'Incapacidad eliminada';
    }
    else{
        echo 'Error al eliminar';
    }
}

?>