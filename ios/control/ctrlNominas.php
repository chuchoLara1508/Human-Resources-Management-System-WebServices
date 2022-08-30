<?php
require('../../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arreglo=array();
$arregloFinal=array();
$palabra="";
$query='select * from tbnominas';
if(isset($_POST["palabra"])&&!empty($_POST["palabra"])){ 
    $palabra=$_POST["palabra"];
    $query.=' where (nombre like("%'.$palabra.'%") or puesto like("%'.$palabra.'%") or incapacidad like("%'.$palabra.'%"))';
}

if($querySQL=mysqli_query($con->conect(),$query)){
    $n=0;
    while($res=mysqli_fetch_assoc($querySQL)){
        $arreglo["clave"]=array();
        $arreglo["clave"]=$res["clave"];
        $arreglo["clave_empleado"]=array();
        $arreglo["clave_empleado"]=$res["clave_empleado"];
        $arreglo["nombre"]=array();
        $arreglo["nombre"]=$res["nombre"];
        $arreglo["puesto"]=array();
        $arreglo["puesto"]=$res["puesto"];
        $arreglo["fecha_inicio"]=array();
        $arreglo["fecha_inicio"]=$res["fecha_inicio"];
        $arreglo["fecha_fin"]=array();
        $arreglo["fecha_fin"]=$res["fecha_fin"];
        $arreglo["fecha_pago"]=array();
        $arreglo["fecha_pago"]=$res["fecha_pago"];
        $arreglo["horas"]=array();
        $arreglo["horas"]=$res["horas"];
        $arreglo["incapacidad"]=array();
        $arreglo["incapacidad"]=$res["incapacidad"];
        $arreglo["dias"]=array();
        $arreglo["dias"]=$res["dias"];
        $arreglo["descISR"]=array();
        $arreglo["descISR"]=$res["descISR"];
        $arreglo["descIMSS"]=array();
        $arreglo["descIMSS"]=$res["descIMSS"];
        $arreglo["descInc"]=array();
        $arreglo["descInc"]=$res["descInc"];
        $arreglo["pago_dia"]=array();
        $arreglo["pago_dia"]=$res["pago_dia"];
        $arreglo["pago_hora"]=array();
        $arreglo["pago_hora"]=$res["pago_hora"];
        $arreglo["total_desc"]=array();
        $arreglo["total_desc"]=$res["total_desc"];
        $arreglo["total_horas"]=array();
        $arreglo["total_horas"]=$res["total_horas"];
        $arreglo["total_dias"]=array();
        $arreglo["total_dias"]=$res["total_dias"];
        $arreglo["total"]=array();
        $arreglo["total"]=$res["total"];
        array_push($arregloFinal,$arreglo);
        $n++; 
    }

}
echo json_encode($arregloFinal);

?>