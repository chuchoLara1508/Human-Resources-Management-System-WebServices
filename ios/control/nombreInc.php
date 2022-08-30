<?php 

require('../../modelo/CConexion.php');

$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();
$query='select nombre from tbincapacidades';
if($resultado=mysqli_query($con->conect(),$query)){
    $i=0;
    while($res=mysqli_fetch_assoc($resultado)){
        $arr["$i"]=$res["nombre"];
        array_push($arregloFinal,$arr);
        $i++;
    }
}

echo json_encode($arr,JSON_FORCE_OBJECT);

?>