<?php

require('../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();
$pal="";
$ordenar="";
$query='';
if(isset($_GET["tabla"])&&!empty($_GET["tabla"])){
    $tabla=$_GET["tabla"];
    if($tabla==1){
        $query='select count(*) as total from tbdepartamentos ';
        if(isset($_POST["palabra"])&&isset($_POST["ordenar"])){
            $pal=$_GET["palabra"];
            $ordenar=$_GET["ordenar"];
            if($pal!=""){
                $query.=' where nombre like ("%'.$pal.'%") or descripcion like("%'.$pal.'%")';
            }
            if($ordenar>0){
                if($ordenar==1){
                    $query.=' order by nombre ASC';
                }
                if($ordenar==2){
                    $query.=' order by descripcion ASC';
                }
                if($ordenar==3){
                    $query.=' order by nombre DESC';
                }
                if($ordenar==4){
                    $query.=' order by descripcion DESC';
                }
            }
        }
    }
    if($tabla==2){

    }
    if($querySQL=mysqli_query($con->conect(),$query)){
        $res=mysqli_fetch_assoc($querySQL);
        $arr["0"]=$res["total"];
        array_push($arregloFinal,$arr);
    }
}

echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>