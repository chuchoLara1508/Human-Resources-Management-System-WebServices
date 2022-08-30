<?php 
   require('../modelo/CConexion.php');
    $con= new CConexion('root','localhost','','recursos_humanos');
    $clave="";
    $clvEmp="";
    $nombre="";
    $puesto="";
    $fecha1="";
    $fecha2="";
    $periodo="";
    $fechaPago="";
    $horas=0;
    $pagoHora=0;
    $pagoDia=0;
    $totalHoras=0;
    $dias=0;
    $inc="";
    $porcentaje="";
    $diasInc=0;
    $isr=0;
    $imss=0;
    $desc=0;
    $nominas=array();
    $total=0;
    
    if(isset($_POST["clave"])&&!empty($_POST["clave"])){
        $clave=$_POST["clave"];
    }

    $query='select * from tbnominas where clave="'.$clave.'"';
    if($sql=mysqli_query($con->conect(),$query)){
        if($res=mysqli_fetch_assoc($sql)){
            $clvEmp=$res["clave_empleado"];
            $nombre=$res["nombre"];
            $puesto=$res["puesto"];
            //sacar periodo
            $fecha1=formatoFecha($res["fecha_inicio"]);
            $fecha2=formatoFecha($res["fecha_fin"]);
            $periodo=$fecha1." al ".$fecha2;
            $fechaPago=formatoFecha($res["fecha_pago"]);
            $horas=$res["horas"];
            $pagoHora=$res["pago_hora"];
            $pagoDia=$res["pago_dia"];
            $totalHoras=$res["total_horas"];
            $dias=$res["total_dias"];
            $inc=$res["incapacidad"];
            //pendiente descuento
            $query2='select * from tbincapacidades where nombre="'.$inc.'"';
            if($sq=mysqli_query($con->conect(),$query2)){
                if($res2=mysqli_fetch_assoc($sq)){
                    $porcentaje=$res2["descuento"];
                }
            }
            $diasInc=$res["dias"];
            $isr=$res["descISR"];
            $imss=$res["descIMSS"];
            $desc=$res["descInc"];
            $total=$res["total"];
        }

    }

    function formatoFecha($vfecha)
    {
        $fch=explode("-",$vfecha);
        $tfecha=$fch[2]."-".$fch[1]."-".$fch[0];
        return $tfecha;
    }
    
    include ("pdf/fpdf.php");
    $pdf= new FPDF();
    $pdf->AddPage('portrait','letter');
    $pdf->SetFont("Arial","B",20);
    $pdf->SetY(10);
    $pdf->SetX(0);//valor final x=153
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(11, 24, 64);
    $pdf->SetDrawColor(11, 24, 64);
    $pdf->Cell(216,10,utf8_decode("Nómina de Empleado"),0,'','C',true);
    $pdf->SetFont("Arial","",12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetY(30);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Clave de Nómina: ".$clave),0,'','L',false);
    $pdf->SetY(40);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Clave de Empleado: ".$clvEmp),0,'','L',false);
    $pdf->SetY(50);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Empleado: ".$nombre),0,'','L',false);
    $pdf->SetY(30);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Puesto: ".$puesto),0,'','L',false);
    $pdf->SetY(40);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Período: ".$periodo),0,'','L',false);
    $pdf->SetY(50);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Fecha de pago: ".$fechaPago),0,'','L',false);
    $pdf->SetFont("Arial","BI",15);
    $pdf->SetY(70);
    $pdf->SetX(0);//valor final x=153
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(217, 93, 4);
    $pdf->SetDrawColor(217, 93, 4);
    $pdf->Cell(216,7,utf8_decode("Detalles"),0,'','C',true);
    $pdf->SetFont("Arial","IU",12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetY(80);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Información sobre desempeño"),0,'','L',false);
    $pdf->SetFont("Arial","",12);
    $pdf->SetY(90);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Horas/día: ".$horas),0,'','L',false); 
    $pdf->SetY(100);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Total de horas trabajadas: ".$totalHoras),0,'','L',false);
    $pdf->SetY(110);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Cant. de días trabajados: ".$dias),0,'','L',false);
    $pdf->SetFont("Arial","IU",12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetY(80);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Información sobre incapacidad"),0,'','L',false);
    $pdf->SetFont("Arial","",12);
    $pdf->SetY(90);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Incapacidad: ".$inc),0,'','L',false);
    $pdf->SetY(100);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Descuento/día: ".$porcentaje."%"),0,'','L',false);
    $pdf->SetY(110);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Días en incapacidad: ".$diasInc),0,'','L',false);
    $pdf->SetFont("Arial","IU",12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetY(130);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Información de descuentos"),0,'','L',false);
    $pdf->SetFont("Arial","",12);
    $pdf->SetY(140);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Descuento ISR: $".$isr."MXN"),0,'','L',false);
    $pdf->SetY(150);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Descuento IMSS: $".$imss."MXN"),0,'','L',false);
    $pdf->SetY(160);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Descuento Incapacidad: $".$desc."MXN"),0,'','L',false);
    $pdf->SetFont("Arial","IU",12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetY(130);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Información sobre pagos y subtotal"),0,'','L',false);
    $pdf->SetFont("Arial","",12);
    $pdf->SetY(140);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Pago/hora: $".$pagoHora." MXN"),0,'','L',false);
    $pdf->SetY(150);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Pago/día: $".$pagoDia." MXN"),0,'','L',false);
    $pdf->SetY(160);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("Subtotal: $".($pagoDia*$dias)." MXN"),0,'','L',false);
    $pdf->SetFont("Arial","",12);
    $pdf->SetY(180);
    $pdf->SetX(2.5);
    $pdf->Cell(216,10,utf8_decode("Total de descuentos: $".($isr+$imss+$desc)." MXN"),0,'','C',false);
    $pdf->SetFont("Arial","B",12);
    $pdf->SetY(210);
    $pdf->SetX(0);
    $pdf->SetDrawColor(217, 93, 4);
    $pdf->Cell(216,10,utf8_decode("Total: $".$total." MXN"),1,'','C',false);
    $pdf->SetFont("Arial","",12);
    $pdf->SetY(240);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("        ___________________"),0,'','L',false);
    $pdf->SetY(245);
    $pdf->SetX(15);
    $pdf->Cell(10,10,utf8_decode("Firma responsable de la empresa"),0,'','L',false);
    $pdf->SetY(240);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("        ___________________"),0,'','L',false);
    $pdf->SetY(245);
    $pdf->SetX(135);
    $pdf->Cell(10,10,utf8_decode("    Firma empleado de recibido"),0,'','L',false);
    $pdf->Close();
    $pdf->Output('F',"nominas/".$clave.".pdf",true);

?>
