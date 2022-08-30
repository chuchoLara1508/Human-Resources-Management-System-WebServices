<?php 

include('../modelo/CConexion.php');

$con= new CConexion("root","localhost","","recursos_humanos");

if(
    (isset($_POST["clv"])&&!empty($_POST["clv"]))
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
    $fecI=$_POST["fecI"];
    $fecF=$_POST["fecF"];
    $fecP=$_POST["fecP"];
    $horas=$_POST["horas"];
    $inc=$_POST["inc"];
    $dias=$_POST["dias"];
    $descISR=$_POST["descISR"];
    $descIMSS=$_POST["descIMSS"];
    $descInc=$_POST["descInc"];
    $pdia=$_POST["pdia"];
    $phora=$_POST["phora"];
    $desc=$_POST["desc"];
    $thoras=$_POST["thoras"];
    $tdias=$_POST["tdias"];
    $total=$_POST["total"];
    $query='update tbnominas set fecha_inicio="'.$fecI.'"
    ,fecha_fin="'.$fecF.'",fecha_pago="'.$fecP.'"
    ,horas="'.$horas.'",incapacidad="'.$inc.'"
    ,dias="'.$dias.'",descISR="'.$descISR.'"
    ,descIMSS="'.$descIMSS.'",descInc="'.$descInc.'"
    ,pago_dia="'.$pdia.'",pago_hora="'.$phora.'"
    ,total_desc="'.$desc.'",total_horas="'.$thoras.'"
    ,total_dias="'.$tdias.'",total="'.$total.'" where clave="'.$clv.'"';
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