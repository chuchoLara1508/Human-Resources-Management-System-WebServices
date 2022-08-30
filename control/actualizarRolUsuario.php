<?php 

require('../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();
if(isset($_GET["rol"])&&!empty($_GET["rol"])){
    $rol=$_GET["rol"];
}

$query='select actualizar from tbrolespermisos where clave_rol="'.$rol.'" order by clave_modulo';

if($querySQL=mysqli_query($con->conect(),$query)){
    $i=0;
    while($res=mysqli_fetch_assoc($querySQL)){
        $arr[$i]=$res["actualizar"];
        $i++;
    }
    array_push($arregloFinal,$arr);
}

echo json_encode($arregloFinal,JSON_FORCE_OBJECT);


?>