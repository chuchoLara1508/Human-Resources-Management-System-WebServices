<?php
require('../../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arreglo=array();
$arregloFinal=array();
$palabra="";
$query='select * from tbusuarios';

if(isset($_POST["palabra"])&&!empty($_POST["palabra"])){ 
    $palabra=$_POST["palabra"];
    $query.=' where (nombre like("%'.$palabra.'%") or usuario like("%'.$palabra.'%") or correo like("%'.$palabra.'%"))';
}

if($querySQL=mysqli_query($con->conect(),$query)){
    $n=0;
    while($res=mysqli_fetch_assoc($querySQL)){
        $arreglo["clave"]=array();
        $arreglo["clave"]=$res["clave"];
        $arreglo["clave_rol"]=array();
        $arreglo["clave_rol"]=$res["clave_rol"];
        $arreglo["nombre"]=array();
        $arreglo["nombre"]=$res["nombre"];
        $arreglo["usuario"]=array();
        $arreglo["usuario"]=$res["usuario"];
        $arreglo["contra"]=array();
        $arreglo["contra"]=$res["contra"];
        $arreglo["correo"] = array();
        $arreglo["correo"] = $res["correo"];
        $arreglo["clave_empleado"] = array();
        $arreglo["clave_empleado"] = $res["clave_empleado"];
        array_push($arregloFinal,$arreglo);
        $n++; 
    }

}
echo json_encode($arregloFinal);

?>