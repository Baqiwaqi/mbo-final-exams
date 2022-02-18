<?php


require('fpdf.php');

//Connect to your database
include("includes/db.php");

//Create new pdf file
$pdf=new FPDF();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//set initial y axis position per page
$y_axis_initial = 25;
$row_height = 25;
//print column titles
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',10);
$pdf->SetY(25);
$pdf->SetX(2);
$pdf->Cell(10,6,'Id',1,0,'L',1);
$pdf->Cell(30,6,'Naam',1,0,'L',1);
$pdf->Cell(30,6,'Email',1,0,'L',1);
$pdf->Cell(25,6,'Geboorte',1,0,'L',1);
$pdf->Cell(20,6,'Minderjarig',1,0,'L',1);
$pdf->Cell(30,6,'Werk of opleiding',1,0,'L',1);
$pdf->Cell(30,6,'Startdatum',1,0,'L',1);
$pdf->Cell(30,6,'InschrijfDatum',1,0,'L',1);

$y_axis = $y_axis_initial + $row_height;

//Select the Products you want to show in your PDF file
$sql = "SELECT * FROM jongeren";
$result = $conn->query($sql);

//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

//Set Row Height
$row_height = 6;

while($row = $result->fetch_assoc())
{
    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    {
        $pdf->AddPage();

        //print column titles for the current page
        $pdf->SetY($y_axis_initial);
        $pdf->SetX(2);
        $pdf->Cell(10,6,'Id',1,0,'L',1);
        $pdf->Cell(25,6,'Naam',1,0,'L',1);
        $pdf->Cell(30,6,'Email',1,0,'L',1);
        $pdf->Cell(25,6,'Geboorte Datum',1,0,'L',1);
        $pdf->Cell(20,6,'Minderjarig',1,0,'L',1);
        $pdf->Cell(30,6,'Werk of opleiding',1,0,'L',1);
        $pdf->Cell(30,6,'Startdatum werk of opleiding',1,0,'L',1);
        $pdf->Cell(30,6,'InschrijfDatum',1,0,'L',1);


        //Go to next row
        $y_axis = $y_axis + $row_height;

        //Set $i variable to 0 (first row)
        $i = 0;
    }
    if ($row["jongerenGeboortedatum"] >= (date('Y') - 18).'-'.date('m-d')) {
      $minderjarig = "Ja";
    }else {
      $minderjarig = "Nee";
    }

    $id = $row['jongerenId'];
    $naam = $row['jongerenNaam'];
    $email = $row['jongerenEmail'];
    $geboorte = $row['jongerenGeboortedatum'];
    $minderjarig = $minderjarig;
    $werkopleiding = $row['jongerenWerkOpleiding'];
    $start = $row['jongerenStartdatum'];
    $inschrijf = $row['jongerenInschrijfdatum'];




    $pdf->SetY($y_axis);
    $pdf->SetX(2);
    $pdf->Cell(10,6,$id,1,0,'L',1);
    $pdf->Cell(30,6,$naam,1,0,'L',1);
    $pdf->Cell(30,6,$email,1,0,'L',1);
    $pdf->Cell(25,6,$geboorte,1,0,'L',1);
    $pdf->Cell(20,6,$minderjarig,1,0,'L',1);
    $pdf->Cell(30,6,$werkopleiding,1,0,'L',1);
    $pdf->Cell(30,6,$start,1,0,'L',1);
    $pdf->Cell(30,6,$inschrijf,1,0,'L',1);



    //Go to next row
    $y_axis = $y_axis + $row_height;
    $i = $i + 1;
}

$conn->close();

//Send file
$pdf->Output();
?>
