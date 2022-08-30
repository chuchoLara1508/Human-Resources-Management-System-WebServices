<?php 

include('../modelo/CConexion.php');

$con= new CConexion("root","localhost","","recursos_humanos");

if(
    (isset($_POST["clave"])&&!empty($_POST["clave"]))
    &&
    (isset($_POST["nombre"])&&!empty($_POST["nombre"]))
    &&
    (isset($_POST["descripcion"])&&!empty($_POST["descripcion"]))
    &&
    (isset($_POST["departamento"])&&!empty($_POST["departamento"]))
    &&
    (isset($_POST["pago"])&&!empty($_POST["pago"]))
    &&
    (isset($_POST["clvDepto"])&&!empty($_POST["clvDepto"]))
){
    $clave=$_POST["clave"];
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $departamento=$_POST["departamento"];
    $pago=$_POST["pago"];
    $clvDepto=$_POST["clvDepto"];
    $query='update tbpuestos set nombre="'.$nombre.'",descripcion="'.$descripcion.'",departamento="'.$departamento.'",pago='.$pago.',clavedepto="'.$clvDepto.'" where clave="'.$clave  .'"';
    if(mysqli_query($con->conect(),$query)){
        echo 'Edición exitosa!';
    }
    else{
        echo 'Error al editar';
    }
}
else{
    echo 'Campos insuficientes';
}

?>