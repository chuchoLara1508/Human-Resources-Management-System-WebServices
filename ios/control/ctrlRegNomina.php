<?php 

include('../../modelo/CConexion.php');

$con= new CConexion("root","localhost","","recursos_humanos");

if(
    (isset($_POST["clv"])&&!empty($_POST["clv"]))
    &&
    (isset($_POST["clvE"])&&!empty($_POST["clvE"]))
    &&
    (isset($_POST["nombre"])&&!empty($_POST["nombre"]))
    &&
    (isset($_POST["puesto"])&&!empty($_POST["puesto"]))
    &&
    (isset($_POST["fecI"])&&!empty($_POST["fecI"]))
    &&
    (isset($_POST["fecF"])&&!empty($_POST["fecF"]))
    &&
    (isset($_POST["fecP"])&&!empty($_POST["fecP"]))
    &&
    (isset($_POST["horas"])&&!empty($_POST["horas"]))
    &&
    (isset($_POST["inc"])&&!empty($_POST["inc"]))
    &&
    (isset($_POST["dias"]))
    &&
    (isset($_POST["descISR"]))
    &&
    (isset($_POST["descIMSS"]))
    &&
    (isset($_POST["descInc"]))
    &&
    (isset($_POST["pdia"]))
    &&
    (isset($_POST["phora"]))
    &&
    (isset($_POST["desc"]))
    &&
    (isset($_POST["thoras"]))
    &&
    (isset($_POST["tdias"]))
    &&
    (isset($_POST["total"]))
){
    $clv=$_POST["clv"];
    $clvE=$_POST["clvE"];
    $nombre=$_POST["nombre"];
    $puesto=$_POST["puesto"];
    $fecI=$_POST["fecI"];
    $fecF=$_POST["fecF"];
    $fecP=$_POST["fecP"];
    $horas=intval($_POST["horas"]);
    $inc=$_POST["inc"];
    $dias=intval($_POST["dias"]);
    $descISR=doubleval($_POST["descISR"]);
    $descIMSS=doubleval($_POST["descIMSS"]);
    $descInc=doubleval($_POST["descInc"]);
    $pdia=doubleval($_POST["pdia"]);
    $phora=doubleval($_POST["phora"]);
    $desc=doubleval($_POST["desc"]);
    $thoras=intval($_POST["thoras"]);
    $tdias=intval($_POST["tdias"]);
    $total=doubleval($_POST["total"]);
    $query='insert into tbnominas (clave,clave_empleado,nombre
    ,puesto,fecha_inicio,fecha_fin,fecha_pago,horas,incapacidad,dias
    ,descISR,descIMSS,descInc,pago_dia,pago_hora,total_desc,total_horas
    ,total_dias,total) values("'.$clv.'","'.$clvE.'","'.$nombre.'"
    ,"'.$puesto.'","'.$fecI.'","'.$fecF.'","'.$fecP.'",'.$horas.'
    ,"'.$inc.'",'.$dias.','.$descISR.','.$descIMSS.','.$descInc.'
    ,'.$pdia.','.$phora.','.$desc.','.$thoras.','.$tdias.','.$total.')';
    if(mysqli_query($con->conect(),$query)){    
        $arreglo["0"]=array();
        $arreglo["0"]="1";
    }
    echo json_encode($arreglo,JSON_FORCE_OBJECT);
}


?>