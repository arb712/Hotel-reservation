<?php

// memanggil library FPDF

require('fpdf.php');

// intance object dan memberikan pengaturan halaman PDF

$pdf = new FPDF('l','mm','A5');

// membuat halaman baru

$pdf->AddPage();

// setting jenis font yang akan digunakan

$pdf->SetFont('Arial','B',16);

// mencetak string 

$pdf->Cell(190,7,'Report Reservation',0,1,'C');

$pdf->SetFont('Arial','B',12);


// Memberikan space kebawah agar tidak terlalu rapat

$pdf->Cell(10,7,'',0,1);



$pdf->SetFont('Arial','B',10);

$pdf->Cell(20,6,'#',1,0);

$pdf->Cell(40,6,'Nama',1,0);

$pdf->Cell(85,6,'Room',1,0);

$pdf->Cell(27,6,'Bed',1,0);

$pdf->Cell(25,6,'Status',1,1);



$pdf->SetFont('Arial','',10);



include 'koneksi.php';

$res = mysqli_query($con, "select * from roombook");

while ($row = mysqli_fetch_array($res)){

    $pdf->Cell(20,6,$row['id'],1,0);

    $pdf->Cell(40,6,$row['FName'],1,0);

    $pdf->Cell(85,6,$row['TRoom'],1,0);

    $pdf->Cell(27,6,$row['Bed'],1,0);

    $pdf->Cell(25,6,$row['stat'],1,1); 

}



$pdf->Output();

?>