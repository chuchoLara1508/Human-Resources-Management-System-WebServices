<?php 

include('../modelo/CConexion.php');

$con= new CConexion("root","localhost","","recursos_humanos");

if(
    (isset($_POST["clave"])&&!empty($_POST["clave"]))
    &&
    (isset($_POST["nombre"])&&!empty($_POST["nombre"]))
    &&
    (isset($_POST["telefono"])&&!empty($_POST["telefono"]))
    &&
    (isset($_POST["curp"])&&isset($_POST["rfc"]))
    &&
    (isset($_POST["direccion"])&&!empty($_POST["direccion"]))
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
    $direccion=$_POST["direccion"];
    $cuenta=$_POST["cuenta"];
    $puesto=$_POST["puesto"];
    $fecha=$_POST["fecha"];
    $nivel=$_POST["nivel"];
    $genero=$_POST["genero"];
    $pais=$_POST["pais"];
    $clvPuesto=$_POST["clvPuesto"];
    $clvPais=$_POST["clvPais"];
    $query='insert into tbempleados (clave,nombre,numero,curp,rfc,direccion,numero_cuenta,puesto,fecha,nivel_escolar,genero,pais,clavepuesto,clavepais) values("'.$clave.'","'.$nombre.'","'.$telefono.'","'.$curp.'","'.$rfc.'","'.$direccion.'","'.$cuenta.'","'.$puesto.'","'.$fecha.'","'.$nivel.'","'.$genero.'","'.$pais.'","'.$clvPuesto.'",'.$clvPais.')';
    if(mysqli_query($con->conect(),$query)){    
        echo 'Empleado registrado exitosamente';
    }
    else{
        echo 'Error al registrar';
    }
}
else{
    echo 'Campos insuficientes';
}


?>