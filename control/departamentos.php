<?php

require('../modelo/CConexion.php');
$entregado=file_get_contents("php://input");
$con= new CConexion('root','localhost','','recursos_humanos');
$datos=json_decode($entregado);
$arr=array();
$arregloFinal=array();

$query='select * from tbdepartamentos ';
if(isset($datos->{"palabra"})&&isset($datos->{"ordenado"})){
    $palabra=$datos->{"palabra"};
    $ordenado=$datos->{"ordenado"};
    $query.=' where nombre like("%'.$palabra.'%") or descripcion like("%'.$palabra.'%")';
    if($ordenado>0){
        if($ordenado==1){
            $query.=' order by nombre ASC';
        }
        if($ordenado==2){
            $query.=' order by descripcion ASC';
        }
        if($ordenado==3){
            $query.=' order by nombre DESC';
        }
        if($ordenado==4){
            $query.=' order by descripcion DESC';
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
        array_push($arregloFinal,$arr);
        $i++;
    }
}
echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>