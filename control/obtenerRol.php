<?php 

require('../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$clvRol="";
$arregloFinal=array();
if(isset($_GET["usuari"])&&!empty($_GET["usuari"])){
    $usuari=$_GET["usuari"];
}

$query='select clave_rol from tbusuarios where usuario="'.$usuari.'"';
if($resultado=mysqli_query($con->conect(),$query)){
    $res=mysqli_fetch_assoc($resultado);
    $clvRol=$res["clave_rol"];
    $query2='select nombre from roles where clave="'.$clvRol.'"';
    if($resultado1=mysqli_query($con->conect(),$query2)){
        $res1=mysqli_fetch_assoc($resultado1);
        $arr["0"]=array();
        $arr["0"]=$res1["nombre"];
        array_push($arregloFinal,$arr);
    }
}
echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>