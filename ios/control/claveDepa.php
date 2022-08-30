<?php 

require('../../modelo/CConexion.php');

$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$arregloFinal=array();

$query='select clave from tbdepartamentos';

if($resultado=mysqli_query($con->conect(),$query)){
    $i=0;
    while($res=mysqli_fetch_assoc($resultado)){
        $arr["0"]=array();
        $arr["0"]=$res["clave"];
        array_push($arregloFinal,$arr);
        $i++;
    }
}

echo json_encode($arregloFinal,JSON_FORCE_OBJECT);

?>