<?php
if(!empty($_POST['submit']))
{

  $file = fopen("/home/nic/Dokumenty/pokus/file.csv","r");
  $data = (fgetcsv($file));
  fclose($file);

  $file1 = fopen("/home/nic/Dokumenty/web/venv/data/odmer.csv","r");
  $data1 = (fgetcsv($file1));
  $mlfb = $data1[2];
  $z = $data1[4];
  $cislo = $data1[3];
  $odmer = $data1[5];
  fclose($file1);



$datum = StrFTime("%Y.%m.%d", Time());
$firma=$_POST['firma'];

$odpor=$_POST['odpor'];
$izolace=$_POST['izolace'];
$mezir=$_POST['mezir'];
$mechs=$_POST['mechs'];

$rotor=$_POST['rotor'];
$napeti=$_POST['napeti'];
$mechr=$_POST['mechr'];

$moment=$_POST['moment'];
$elekt=$_POST['elekt'];
$mechb=$_POST['mechb'];

$loz=$_POST['loz'];

$sigl=$_POST['sigl'];
$dq=$_POST['dq'];
$mecho=$_POST['mecho'];

$kon=$_POST['kon'];
$typkon=$_POST['typkon'];
$sil=$_POST['sil'];
$sig=$_POST['sig'];
$sigkab=$_POST['sigkab'];

$pre=$_POST['pre'];
$zad=$_POST['zad'];

$zne=$_POST['zne'];

$pozn=$_POST['pozn'];

$image1 = "/home/nic/Dokumenty/web/venv/static/obr/_jemno.jpg";
$image2 = "/home/nic/Dokumenty/web/venv/static/obr/_abr.jpg";
$image3 = "/home/nic/Dokumenty/web/venv/static/obr/_kolecko.jpg";

require('fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();


$pdf->SetFont("Arial",B,24);
$pdf->Cell(0,20,"SIEMENS DIAGNOSTICKY LIST",'L,T,R',1,'L');
$pdf->SetFont("Arial","",8);

$pdf->Cell(95,5,"Siemens s.r.o.", 'L', 0, 'L');
$pdf->Cell(95,5,"Tel: 800 122 552",'R',1,'L');
$pdf->Cell(95,5,"Oparating company digital Industries",'L', 0, 'L');
$pdf->Cell(95,5,"Tel: 326 716 889",'R', 1,'l');
$pdf->Cell(95,5,"www.siemens.cz",'L,B', 0, 'L');
$pdf->Cell(95,5,"E-mail: servis.cz@siemens.com",'R,B',1,'L');

$pdf->SetFont("Arial","",8);
$pdf->Cell(47.5,10,"Zakaznik",0,0);
$pdf->Cell(47.5,10,"",0,0);
$pdf->Cell(47.5,10,"Motor",0,0);
$pdf->Cell(47.5,10,"",0,1);

$pdf->Cell(30,5,"firma",1,0);
$pdf->Cell(55,5,$firma,1,0);
$pdf->Cell(10,5,"",0,0);
$pdf->Cell(30,5,"mlfb",1,0);
$pdf->Cell(65,5,"$mlfb",1,1);

$pdf->Cell(30,5,"Adresa",1,0);
$pdf->Cell(55,5,"",1,0);
$pdf->Cell(10,5,"",0,0);
$pdf->Cell(30,5,"Z",1,0);
$pdf->Cell(65,5,"$z",1,1);

$pdf->Cell(30,5,"Kontakt",1,0);
$pdf->Cell(55,5,"",1,0);
$pdf->Cell(10,5,"",0,0);
$pdf->Cell(30,5,"ser cislo",1,0);
$pdf->Cell(65,5,"$cislo",1,1);

$pdf->Cell(30,5,"Tel:",1,0);
$pdf->Cell(55,5,"",1,0);
$pdf->Cell(10,5,"",0,0);
$pdf->Cell(30,5,"datum",1,0);
$pdf->Cell(65,5,$datum,1,1);

$pdf->Cell(0,10,"STATOR",0,1);

$pdf->Cell(47.5,5,"Odpor",1,0,L);
$pdf->Cell(20,5,"Izolacni odpor",1,0,L);
$pdf->Cell(20,5,"Mezi. R",1,0,L);
$pdf->Cell(20,5,"Mech. posk.",1,1,L);

$pdf->Cell(47.5,5,$odpor,1,0,L);
$pdf->Cell(20,5,$izolace,1,0,L);
$pdf->Cell(20,5,$mezir,1,0,L);
$pdf->Cell(20,5,$mechs,1,1,L);

$pdf->Cell(0,10,"ROTOR",0,1);
$pdf->Cell(47.5,5,"Nap�t�",1,0);
$pdf->Cell(20,5,"Mezi. napeti",1,0);
$pdf->Cell(20,5,"Mech. posk.",1,1);

$pdf->Cell(47.5,5,$rotor,1,0);
$pdf->Cell(20,5,$napeti,1,0);
$pdf->Cell(20,5,$mechr,1,1);


$pdf->Cell(0,10,"BRZDA",0,1);
$pdf->Cell(47.5,5,"Moment brzdy",1,0);
$pdf->Cell(20,5,"Elektricky",1,0);
$pdf->Cell(20,5,"Mechanicky",1,1);
$pdf->Cell(47.5,5,$moment,1,0);
$pdf->Cell(20,5,$elekt,1,0);
$pdf->Cell(20,5,$mechb,1,1);

$pdf->Cell(0,10,"LOZISKA",0,1);
$pdf->Cell(20,5,"Loziska",1,1);
$pdf->Cell(20,5,$loz,1,1);

$pdf->Cell(0,10,"ODMEROVANI",0,1);
$pdf->Cell(47.5,5,"Typ",1,0);
$pdf->Cell(20,5,"Signaly",1,0);
$pdf->Cell(20,5,"Mechanicky",1,0);
$pdf->Cell(20,5,"DQ",1,1);
$pdf->Cell(47.5,5,$odmer,1,0);
$pdf->Cell(20,5,$sigl,1,0);
$pdf->Cell(20,5,$mecho,1,0);
$pdf->Cell(20,5,$dr,1,1);

$pdf->Cell(0,10,"KONEKTORY",0,1);
$pdf->Cell(15,5,"Vel",1,0);
$pdf->Cell(47.5,5,"Typ",1,0);
$pdf->Cell(20,5,"Signalovy",1,0);
$pdf->Cell(20,5,"Silovy",1,0);
$pdf->Cell(20,5,"Sig. kab.",1,1);
$pdf->Cell(15,5,$kon,1,0);
$pdf->Cell(47.5,5,$typkon,1,0);
$pdf->Cell(20,5,$sigl,1,0);
$pdf->Cell(20,5,$sil,1,0);
$pdf->Cell(20,5,$sigkab,1,1);

$pdf->Cell(0,10,"LOZISKOVY STIT",0,1);
$pdf->Cell(20,5,"Zadni",1,0);
$pdf->Cell(20,5,"Predni",1,1);

$pdf->Cell(20,5,$zad,1,0);
$pdf->Cell(20,5,$pre,1,1);

$pdf->Cell(0,10,"ZNECISTENI",0,1);
$pdf->Cell(20,5,"Znecisteni",1,1);
$pdf->Cell(20,5,$zne,1,1);

$pdf->Cell(0,10,"POZNAMKA",0,1);
$pdf->Cell(0,25,$pozn,1,1);

if (file_exists($image1)) 
{
  $pdf->AddPage();
  $pdf->Image($image1,0,0,200,300);
}
else 
{
  //echo "The file $image1 does not exists";
}

if (file_exists($image2)) 
{
  $pdf->AddPage();
  $pdf->Image($image2,0,0,200,300);
}
else 
{
  //echo "The file $image2 does not exists";
}

if (file_exists($image3)) 
{
  $pdf->AddPage();
  $pdf->Image($image3,0,0,200,300);
}
else 
{
  //echo "The file $image3 does not exists";
}


$filename="/home/nic/Dokumenty/Diag. l/$firma/$datum _ $mlfb _ $cislo.pdf";
$pdf->Output($filename,'F');
$pdf->Output();
}
?>
