<?php 

require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(50);
$pdf->Cell(80,10,'Order Record',1,0,'C');
$pdf->Ln();
$pdf->Cell(20,10,"ID",1,0,'C');
$pdf->Cell(20,10,"user id",1,0,'C');
$pdf->Cell(60,10,"Product id",1,0,'C');
$pdf->Cell(80,10,"Quantity",1,0,'C');
$pdf->Cell(80,10,"Invoice",1,0,'C');
$pdf->Cell(80,10,"status",1,0,'C');


$pdf->SetFont('Arial','I',12);
$pdf->Ln();

$c=mysqli_connect("localhost","root","","online shopping cart");
$a=mysqli_query($c,"Select * from tbl_order");
while($r=mysqli_fetch_array($a))
{


$pdf->Cell(20,10,$r["id"],1,0,'C');
$pdf->Cell(20,10,$r["user_id"],1,0,'C');
$pdf->Cell(60,10,$r["prd_id"],1,0,'C');
$pdf->Cell(80,10,$r["quantity"],1,0,'C');
$pdf->Cell(80,10,$r["inv"],1,0,'C');
$pdf->Cell(80,10,$r["status"],1,0,'C');

$pdf->Ln();


}
$pdf->Output();
?>