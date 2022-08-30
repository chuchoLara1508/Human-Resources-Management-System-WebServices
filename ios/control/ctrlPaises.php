<?php

require('../../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$query='select * from pais';
$arreglo=array();
if($resultado=mysqli_query($con->conect(),$query)){
    $i=0;
    while($res=mysqli_fetch_assoc($resultado)){
        $arr["id"]=array();
        $arr["id"]=$res["id"];
        $arr["paisnombre"]=array();
        $arr["paisnombre"]=$res["paisnombre"];
        array_push($arreglo,$arr);
        $i++;
    }
}
echo json_encode($arreglo);

?>