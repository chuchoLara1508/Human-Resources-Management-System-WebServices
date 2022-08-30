<?php

require('../../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();
$palabra="";
$rango=0;
$query='select * from tbpuestos';
if(isset($_POST["palabra"])&&!empty($_POST["palabra"])){
    $palabra=$_POST["palabra"];
    $query.=' where (nombre like("%'.$palabra.'%") or descripcion like("%'.$palabra.'%") or departamento like ("%'.$palabra.'%"))'; 
}
if($palabra!=""){
    if(isset($_POST["rango"])){
        if(empty($_POST["rango"])){
            $rango=0;
        }
        else{
            $rango=$_POST["rango"];
        }
        if($rango>0){
            if($rango==1){
                $query.=' and pago>=20 and pago<40';
            }
            if($rango==2){
                $query.=' and pago>=40 and pago<60';
            }
            if($rango==3){
                $query.=' and pago>=60 and pago<80';
            }
            if($rango==4){
                $query.=' and pago>=80 and pago<=100';
            }
        }
    }
}
else{
    if(isset($_POST["rango"])){
        if(empty($_POST["rango"])){
            $rango=0;
        }
        else{
            $rango=$_POST["rango"];
        }
        if($rango>0){
            if($rango==1){
                $query.=' where pago>=20 and pago<40';
            }
            if($rango==2){
                $query.=' where pago>=40 and pago<60';
            }
            if($rango==3){
                $query.=' where pago>=60 and pago<80';
            }
            if($rango==4){
                $query.=' where pago>=80 and pago<=100';
            }
        }
    }
}
if($resultado=mysqli_query($con->conect(),$query)){
    $i=0;
    while($res=mysqli_fetch_assoc($resultado)){
        $arr["0"]=array();
        $arr["0"]=$res["clave"];
        $arr["1"]=array();
        $arr["1"]=$res["nombre"];
        $arr["2"]=array();
        $arr["2"]=$res["descripcion"];
        $arr["3"]=array();
        $arr["3"]=$res["departamento"];
        $arr["4"]=array();
        $arr["4"]=$res["pago"];
        $arr["5"]=array();
        $arr["5"]=$res["clavedepto"];
        array_push($arregloFinal,$arr);
        $i++;
    }
}
echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>