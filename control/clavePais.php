<?php 

require('../modelo/CConexion.php');

$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();
$query='select id from pais';
if($resultado=mysqli_query($con->conect(),$query)){
    $i=0;
    while($res=mysqli_fetch_assoc($resultado)){
        $arr[$i]=$res["id"];
        $i++;
    }
    array_push($arregloFinal,$arr);
}

echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>