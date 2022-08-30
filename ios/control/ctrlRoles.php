<?php

require('../../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();

$query='select * from roles';
if($querySQL=mysqli_query($con->conect(),$query)){
    $i=0;
    while($res=mysqli_fetch_assoc($querySQL)){
        $arr["clave"]=array();
        $arr["clave"]=$res["clave"];
        $arr["nombre"]=array();
        $arr["nombre"]=$res["nombre"];
        array_push($arregloFinal,$arr);
        $i++;
    }
}

echo json_encode($arregloFinal);

?>