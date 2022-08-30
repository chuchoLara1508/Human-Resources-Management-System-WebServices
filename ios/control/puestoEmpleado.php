<?php 

require('../../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();

if(isset($_POST["clv"])&&!empty($_POST["clv"])){
    $clave=$_POST["clv"];
}
else{
    $clave="HQxot";
}

$query='select * from tbempleados where clave="'.$clave.'"';
if($querySQL=mysqli_query($con->conect(),$query)){
    while($res=mysqli_fetch_assoc($querySQL)){
        $arr["0"]=$res["puesto"];
        array_push($arregloFinal,$arr);
    }
}

echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>