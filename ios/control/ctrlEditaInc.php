<?php 

include('../../modelo/CConexion.php');

$con= new CConexion("root","localhost","","recursos_humanos");

if(isset($_POST["clave"])&&!empty($_POST["clave"])
    &&
    (isset($_POST["nombre"])&&!empty($_POST["nombre"]))
    &&
    (isset($_POST["descuento"]))
){
    $clave=$_POST["clave"];
    $nombre=$_POST["nombre"];
    $descuento=intval($_POST["descuento"]);
    $query='update tbincapacidades set nombre="'.$nombre.'",descuento='.$descuento.' where clave="'.$clave.'"';
    if(mysqli_query($con->conect(),$query)){    
        $arreglo["0"]=array();
        $arreglo["0"]="1";
    }

}
echo json_encode($arreglo,JSON_FORCE_OBJECT);

?>