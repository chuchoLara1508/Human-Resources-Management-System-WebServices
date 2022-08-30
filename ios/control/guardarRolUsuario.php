<?php 

require('../../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();
if(isset($_POST["rol"])&&!empty($_POST["rol"])){
    $rol=$_POST["rol"];
}

$query='select guardar from tbrolespermisos where clave_rol="'.$rol.'" order by clave_modulo';
if($querySQL=mysqli_query($con->conect(),$query)){
    $i=0;
    while($res=mysqli_fetch_assoc($querySQL)){
        $arr["$i"]=$res["guardar"];
        $i++;
    }
}

echo json_encode($arr,JSON_FORCE_OBJECT);


?>