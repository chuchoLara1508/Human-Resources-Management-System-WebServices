<?php

include('../../modelo/CConexion.php');

$con= new CConexion("root","localhost","","recursos_humanos");

if(isset($_POST["clave"])&&!empty($_POST["clave"])){
    $clave=$_POST["clave"];
    $query='delete from tbusuarios where clave="'.$clave.'"';
    if(mysqli_query($con->conect(),$query)){    
        $arreglo["0"]=array();
        $arreglo["0"]="1";
    }
    echo json_encode($arreglo,JSON_FORCE_OBJECT);
   
}

?>