<?php 

include('../../modelo/CConexion.php');

$con= new CConexion("root","localhost","","recursos_humanos");
$arreglo=array();
if(
    (isset($_POST["clave"])&&!empty($_POST["clave"]))
    &&
    (isset($_POST["nombre"])&&!empty($_POST["nombre"]))
    &&
    (isset($_POST["telefono"])&&!empty($_POST["telefono"]))
    &&
    (isset($_POST["curp"])&&isset($_POST["rfc"]))
    &&
    (isset($_POST["cuenta"])&&!empty($_POST["cuenta"]))
    &&
    (isset($_POST["puesto"])&&!empty($_POST["puesto"]))
    &&
    (isset($_POST["fecha"])&&!empty($_POST["fecha"]))
    &&
    (isset($_POST["nivel"])&&!empty($_POST["nivel"]))
    &&
    (isset($_POST["genero"])&&!empty($_POST["genero"]))
    &&
    (isset($_POST["pais"])&&!empty($_POST["pais"]))
    &&
    (isset($_POST["clvPuesto"])&&!empty($_POST["clvPuesto"]))
    &&
    (isset($_POST["clvPais"])&&!empty($_POST["clvPais"]))
){
    $clave=$_POST["clave"];
    $nombre=$_POST["nombre"];
    $telefono=$_POST["telefono"];
    $curp=$_POST["curp"];
    $rfc=$_POST["rfc"];
    $cuenta=$_POST["cuenta"];
    $puesto=$_POST["puesto"];
    $fecha=$_POST["fecha"];
    $nivel=$_POST["nivel"];
    $genero=$_POST["genero"];
    $pais=$_POST["pais"];
    $clvPuesto=$_POST["clvPuesto"];
    $clvPais=intval($_POST["clvPais"]);
    $query='update tbempleados set nombre="'.$nombre.'",numero="'.$telefono.'",curp="'.$curp.'",rfc="'.$rfc.'",numero_cuenta="'.$cuenta.'",puesto="'.$puesto.'",fecha="'.$fecha.'",nivel_escolar="'.$nivel.'",genero="'.$genero.'",pais="'.$pais.'",clavepuesto="'.$clvPuesto.'",clavepais='.$clvPais.' where clave="'.$clave.'"';
    if(mysqli_query($con->conect(),$query)){   
        $arreglo["0"]=array();
        $arreglo["0"]="1";
    }

}
echo json_encode($arreglo,JSON_FORCE_OBJECT);


?>