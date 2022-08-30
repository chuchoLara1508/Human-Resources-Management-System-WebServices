<?php 

include('../../modelo/CConexion.php');

$con= new CConexion("root","localhost","","recursos_humanos");
$arreglo=array();
if(
    (isset($_POST["clave"])&&!empty($_POST["clave"]))
    &&
    (isset($_POST["clave_rol"])&&!empty($_POST["clave_rol"]))
    &&
    (isset($_POST["clave_modulo"])&&!empty($_POST["clave_modulo"]))
    &&
    (isset($_POST["guardar"])&&isset($_POST["actu"])&&isset($_POST["elimina"]))
){
    $clave=$_POST["clave"];
    $clave_rol = $_POST["clave_rol"];
    $clave_modulo = $_POST["clave_modulo"];
    $guardar = intval($_POST["guardar"]);
    $actu = intval($_POST["actu"]);
    $elimina = intval($_POST["elimina"]);
    $query='update tbrolespermisos set guardar='.$guardar.',actualizar='.$actu.',eliminar='.$elimina.' where clave="'.$clave.'" and clave_rol="'.$clave_rol.'" and clave_modulo="'.$clave_modulo.'"';
    if(mysqli_query($con->conect(),$query)){    
        $arreglo["0"]=array();
        $arreglo["0"]="1";
    }

}
echo json_encode($arreglo,JSON_FORCE_OBJECT);

?>