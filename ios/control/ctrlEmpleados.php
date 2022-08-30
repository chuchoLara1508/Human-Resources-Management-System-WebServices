<?php
require('../../modelo/CConexion.php');
$con= new CConexion('root','localhost','','recursos_humanos');
$arreglo=array();
$arregloFinal=array();
$palabra="";
$query='select * from tbempleados';

if(isset($_POST["palabra"])&&!empty($_POST["palabra"])){ 
    $palabra=$_POST["palabra"];
    $query.=' where (nombre like("%'.$palabra.'%") or curp like("%'.$palabra.'%") or rfc like("%'.$palabra.'%") or direccion like("%'.$palabra.'%") or puesto like("%'.$palabra.'%") or nivel_escolar like("%'.$palabra.'%") or genero like("%'.$palabra.'%") or pais like("%'.$palabra.'%"))';
}

if($querySQL=mysqli_query($con->conect(),$query)){
    $n=0;
    while($res=mysqli_fetch_assoc($querySQL)){
        $arreglo["clave"]=array();
        $arreglo["clave"]=$res["clave"];
        $arreglo["nombre"]=array();
        $arreglo["nombre"]=$res["nombre"];
        $arreglo["numero"]=array();
        $arreglo["numero"]=$res["numero"];
        $arreglo["curp"]=array();
        $arreglo["curp"]=$res["curp"];
        $arreglo["rfc"]=array();
        $arreglo["rfc"]=$res["rfc"];
        $arreglo["direccion"]=array();
        $arreglo["direccion"]=$res["direccion"];
        $arreglo["n_cuenta"]=array();
        $arreglo["n_cuenta"]=$res["numero_cuenta"];
        $arreglo["puesto"]=array();
        $arreglo["puesto"]=$res["puesto"];
        $arreglo["fecha"]=array();
        $arreglo["fecha"]=$res["fecha"];
        $arreglo["nivel"]=array();
        $arreglo["nivel"]=$res["nivel_escolar"];
        $arreglo["genero"]=array();
        $arreglo["genero"]=$res["genero"];
        $arreglo["pais"]=array();
        $arreglo["pais"]=$res["pais"];
        $arreglo["clavepuesto"]=array();
        $arreglo["clavepuesto"]=$res["clavepuesto"];
        $arreglo["clavepais"]=array();
        $arreglo["clavepais"]=$res["clavepais"];
        array_push($arregloFinal,$arreglo);
        $n++; 
    }

}
echo json_encode($arregloFinal);

?>