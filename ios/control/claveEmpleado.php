<?php 

require('../../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();
if(isset($_POST["claveEmp"])&&!empty($_POST["claveEmp"])){
    $claveEmp=$_POST["claveEmp"];
}
$query='select count(*) as total from tbempleados where clave="'.$claveEmp.'"';
$query2='select nombre from tbempleados where clave="'.$claveEmp.'"';
if($resultado=mysqli_query($con->conect(),$query)){
    $res=mysqli_fetch_assoc($resultado);
    if($res["total"]==1){
        $arr["0"]=array();  
        $arr["0"]=utf8_encode($res["total"]);
        if($result1=mysqli_query($con->conect(),$query2)){
            $res1=mysqli_fetch_assoc($result1);
            $arr["1"]=array();
            $arr["1"]=utf8_encode($res1["nombre"]);
            array_push($arregloFinal,$arr);
        }
    }
    if($res["total"]==0){
        $arr["0"]=array();  
        $arr["0"]=utf8_encode($res["total"]);
        array_push($arregloFinal,$arr);
    }
}
echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>