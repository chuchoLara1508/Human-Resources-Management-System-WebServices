<?php

require('../../modelo/CConexion.php');

$con= new CConexion('root','localhost','','recursos_humanos');
if(isset($_POST["usu"])&&isset($_POST["pass"])){
    $query='select * from tbusuarios where usuario="'.$_POST["usu"].'" and contra="'.md5($_POST["pass"]).'"';

$arr=array();

if($sql=mysqli_query($con->conect(),$query)){
    $n=0;
        while($res=mysqli_fetch_assoc($sql)){
            $arr["0"]=array();
            $arr["0"]=utf8_encode($res["clave"]);
            $arr["1"]=array();
            $arr["1"]=utf8_encode($res["clave_rol"]);
            $arr["2"]=array();
            $arr["2"]=utf8_encode($res["nombre"]);
            $arr["3"]=array();
            $arr["3"]=utf8_encode($res["usuario"]);
            $arr["4"]=array();
            $arr["4"]=utf8_encode($res["contra"]);
            $arr["5"]=array();
            $arr["5"]=utf8_encode($res["correo"]);
            $arr["6"]=array();
            $arr["6"]=utf8_encode($res["clave_empleado"]);
            $n++;
        }
        if(!empty($arr)){
        $query1='select nombre as rol from roles where clave="'.$arr["1"].'"';
        if($sql=mysqli_query($con->conect(),$query1)){
            if($resu=mysqli_fetch_assoc($sql)){
                $arr["7"]=array();
                $arr["7"]=$resu["rol"];
            }
        }
}
}


echo json_encode($arr,JSON_FORCE_OBJECT);
}

?>