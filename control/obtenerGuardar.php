<?php 

require('../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();
$query='select guardar from tbrolespermisos order by clave_modulo ASC';
if($querySQL=mysqli_query($con->conect(),$query)){
    $i=0;
    while($res=mysqli_fetch_assoc($querySQL)){
        $arr[$i]=$res["guardar"];
        $i++;
    }
    array_push($arregloFinal,$arr);
}

echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>