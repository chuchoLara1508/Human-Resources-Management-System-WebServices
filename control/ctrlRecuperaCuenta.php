<?php 

include('ctrlMail.php');
include('../modelo/CConexion.php');
$arreglo=array();
$con= new CConexion("root","localhost","","recursos_humanos");
if(isset($_POST["correo"])&&!empty($_POST["correo"])
    &&
    (isset($_POST["contra"])&&!empty($_POST["contra"]))
){
    $correo=$_POST["correo"];
    $contra=$_POST["contra"];
    $usua="";
    $query='select usuario from tbusuarios where correo="'.$correo.'"';
    if($querysql=mysqli_query($con->conect(),$query)){
        $res=mysqli_fetch_assoc($querysql);
        $usua=$res["usuario"];
    }
    $subje='Recuperación de cuenta';
    $cuerpo='<h2>Recuperación de cuenta</h2>';
    $cuerpo.='<p>Hola <h5>'.$usua.'</h5> Tu solicitud de recuperación de cuenta fue ejecutada con éxito!</p>';
    $cuerpo.='<p>Por lo tanto la nueva contraseña con la que ingresarás es: <em>'.$contra.'</em></p>';
    $cuerpo.='<h5>Saludos Cordiales. Atte: Administración de Recursos Humanos</h5>';
    if(envioRegistro($correo,utf8_decode($subje),utf8_decode($cuerpo))){
        $query1='update tbusuarios set contra="'.md5($contra).'" where correo="'.$correo.'"';
        if($querySQL=mysqli_query($con->conect(),$query1)){
            echo 'Correo electrónico enviado con éxito';
        }
        else{
            echo 'No se logró recuperar la cuenta';
        }
    }
    else{
        echo 'No se logró enviar el correo electrónico';
    }
}
else{
    echo 'Campos insuficientes';
}
?>