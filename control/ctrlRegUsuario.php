<?php

include('ctrlMail.php');
include('../modelo/CConexion.php');

$con= new CConexion("root","localhost","","recursos_humanos");

if(
    (isset($_POST["clave"])&&!empty($_POST["clave"]))
    &&
    (isset($_POST["claverol"])&&!empty($_POST["claverol"]))
    &&
    (isset($_POST["nombre"])&&!empty($_POST["nombre"]))
    &&
    (isset($_POST["contra"])&&!empty($_POST["contra"]))
    &&
    (isset($_POST["correo"])&&!empty($_POST["correo"]))
    &&
    (isset($_POST["claveempleado"])&&!empty($_POST["claveempleado"]))
){
    $clave=$_POST["clave"];
    $claverol=$_POST["claverol"];
    $nombre=$_POST["nombre"];
    $contra=$_POST["contra"];
    $correo=$_POST["correo"];
    $claveempleado=$_POST["claveempleado"];
    $usuario=creaNomUsu($nombre,$claveempleado);
    $subje='Registro de Usuario';
    $cuerp='<h2>Bienvenido a la empresa!</h2>';
    $cuerp.='<p>Has sido registrado correctamente a la aplicación, por lo tanto, tus datos de acceso son: </p>';
    $cuerp.='<ol><li>Usuario: <em>'.$usuario.'</em></li>';
    $cuerp.='<li>Contraseña: <em>'.$contra.'</em></li></ol>';
    if(envioRegistro($correo,utf8_decode($subje),utf8_decode($cuerp))){
        $query='insert into tbusuarios (clave,clave_rol,nombre,usuario,contra,correo,clave_empleado) values("'.$clave.'","'.$claverol.'","'.$nombre.'","'.$usuario.'","'.md5($contra).'","'.$correo.'","'.$claveempleado.'")';
        if(mysqli_query($con->conect(),$query)){
            echo 'Registro exitoso usuario';
        }
        else{
            echo 'Error al registrar';
        }
    }
    else{
        echo 'El correo no se pudo enviar. Registro fallido';
    }
}


function creaNomUsu($nombre,$clave){
    $usua=array();
    $usuario="";
    $usua=explode(" ",$nombre);
    $cant=count($usua);
    if($cant==2){
        $usuario=strtoupper(substr($usua[0],0,3))."".strtoupper(substr($usua[1],0,3))."".strtoupper(substr($clave,0,3));
    }
    if($cant>=3){
        $usuario=strtoupper(substr($usua[0],0,3))."".strtoupper(substr($usua[1],0,3))."".strtoupper(substr($usua[2],0,2))."".strtoupper(substr($clave,0,1));
    }
    return $usuario;
}

?>