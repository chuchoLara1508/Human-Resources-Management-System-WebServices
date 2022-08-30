<?php 

require('../../modelo/CConexion.php');
$entregado=file_get_contents("php://input");
$con= new CConexion('root','localhost','','recursos_humanos');
$datos=json_decode($entregado);
$arr=array();
$arregloFinal=array();
$palabra="";
$rango=0;
$query='select * from tbincapacidades';
if(isset($_POST["palabra"])&&!empty($_POST["palabra"])){
    $palabra=$_POST["palabra"];
    $query.=' where (nombre like("%'.$palabra.'%"))'; 
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
                $query.=' and descuento<20';
            }
            if($rango==2){
                $query.=' and descuento>=20 and descuento<40';
            }
            if($rango==3){
                $query.=' and descuento>=40 and descuento<60';
            }
            if($rango==4){
                $query.=' and descuento>=60 and descuento<80';
            }
            if($rango==5){
                $query.=' and descuento>=80 and descuento<=100';
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
                $query.=' where descuento<20';
            }
            if($rango==2){
                $query.=' where descuento>=20 and descuento<40';
            }
            if($rango==3){
                $query.=' where descuento>=40 and descuento<60';
            }
            if($rango==4){
                $query.=' where descuento>=60 and descuento<80';
            }
            if($rango==5){
                $query.=' where descuento>=80 and descuento<=100';
            }
        }
    }
}
if($resultado=mysqli_query($con->conect(),$query)){
    $i=0;
    while($res=mysqli_fetch_assoc($resultado)){
        $arr["clave"]=array();
        $arr["clave"]=$res["clave"];
        $arr["nombre"]=array();
        $arr["nombre"]=$res["nombre"];
        $arr["descuento"]=array();
        $arr["descuento"]=$res["descuento"];
        array_push($arregloFinal,$arr);
        $i++;
    }
}
echo json_encode($arregloFinal);

?>