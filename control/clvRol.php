<?php 

require('../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregli=array();
$arregloFinal=array();
$query='select * from tbrolespermisos order by clave_modulo ASC';
if($querySQL=mysqli_query($con->conect(),$query)){
    $i=0;
    while($res=mysqli_fetch_assoc($querySQL)){
        $arr[$i]=$res["clave_rol"];
        $i++;
    }
}
for($i=0;$i<count($arr);$i++){
    $query='select nombre from roles where clave="'.$arr[$i].'"';
    if($querySQL=mysqli_query($con->conect(),$query)){
        $res=mysqli_fetch_assoc($querySQL);
        $arregli[$i]=$res["nombre"];
    }
}
array_push($arregloFinal,$arregli);

echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>