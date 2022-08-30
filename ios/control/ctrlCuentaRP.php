<?php 

require('../../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arr=array();
$query='select count(*) as total from tbrolespermisos';
if($querys=mysqli_query($con->conect(),$query)){
    if($res=mysqli_fetch_assoc($querys)){
        $arr["0"]=array();
        $arr["0"]=$res["total"];
    }
}

echo json_encode($arr,JSON_FORCE_OBJECT);

?>