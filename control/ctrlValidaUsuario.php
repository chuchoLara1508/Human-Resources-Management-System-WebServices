<?php 

require('../modelo/CConexion.php');

$entregado=file_get_contents("php://input");
$con= new CConexion('root','localhost','','recursos_humanos');
$datos=json_decode($entregado);
$arreglo=array();

$query='select count(*) as total from tbusuarios where usuario="'.$datos->{"usu"}.'" and contra="'.md5($datos->{"pass"}).'"';
$query2='select * from tbusuarios where usuario="'.$datos->{"usu"}.'" and contra="'.md5($datos->{"pass"}).'"';
if($resultado=mysqli_query($con->conect(),$query)){
    $res=mysqli_fetch_assoc($resultado);
    if($res["total"]==1){
        $arr["0"]=array();
        $arr["0"]=utf8_encode($res["total"]);
        if($result1=mysqli_query($con->conect(),$query2)){
            $res1=mysqli_fetch_assoc($result1);
            $arr["1"]=array();
            $arr["1"]=utf8_encode($res1["clave_rol"]);
            $arr["2"]=array();
            $arr["2"]=utf8_encode($res1["nombre"]);
            $arr["3"]=array();
            $arr["3"]=utf8_encode($res1["usuario"]);
            $arr["4"]=array();
            $arr["4"]=utf8_encode($res1["contra"]);
            $arr["5"]=array();
            $arr["5"]=utf8_encode($res1["correo"]);
            $arr["6"]=array();
            $arr["6"]=utf8_encode($res1["clave_empleado"]);
            array_push($arreglo,$arr);
        }
    }
    if($res["total"]==0){
        $arr["0"]=array();
        $arr["0"]=utf8_encode($res["total"]);
        array_push($arreglo,$arr);
    }
}

echo json_encode($arreglo,JSON_FORCE_OBJECT);

?>