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
$pdf->SetX(10);
$pdf->Cell(10,6,'Id',1,0,'L',1);
$pdf->Cell(40,6,'Naam',1,0,'L',1);
$pdf->Cell(40,6,'Activiteit',1,0,'L',1);
$pdf->Cell(40,6,'Startdatum',1,0,'L',1);
$pdf->Cell(40,6,'Afgerond',1,0,'L',1);

$y_axis = $y_axis_initial + $row_height;

//Select the Products you want to show in your PDF file
$sql = "SELECT jongerenactiviteit.jongerenactiviteitId, jongeren.jongerenNaam, activiteit.activiteitNaam, jongerenactiviteit.activiteitStartdatum, jongerenactiviteit.activiteitAfgerond
        FROM ((jongerenactiviteit
        INNER JOIN jongeren  ON jongerenactiviteit.jongerenId=jongeren.jongerenId)
        INNER JOIN  activiteit ON  jongerenactiviteit.activiteitId=activiteit.activiteitId)";
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
        $pdf->SetX(10);
        $pdf->Cell(10,6,'Id',1,0,'L',1);
        $pdf->Cell(40,6,'Naam',1,0,'L',1);
        $pdf->Cell(40,6,'Activiteit',1,0,'L',1);
        $pdf->Cell(40,6,'Startdatum',1,0,'L',1);
        $pdf->Cell(40,6,'Afgerond',1,0,'L',1);


        //Go to next row
        $y_axis = $y_axis + $row_height;

        //Set $i variable to 0 (first row)
        $i = 0;
    }


    $id = $row["jongerenactiviteitId"];
    $naam = $row["jongerenNaam"];
    $activiteitNaam = $row["activiteitNaam"];
    $datum = $row["activiteitStartdatum"];
    $afgerond = $row["activiteitAfgerond"];





    $pdf->SetY($y_axis);
    $pdf->SetX(10);
    $pdf->Cell(10,6,$id,1,0,'L',1);
    $pdf->Cell(40,6,$naam,1,0,'L',1);
    $pdf->Cell(40,6,$activiteitNaam,1,0,'L',1);
    $pdf->Cell(40,6,$datum,1,0,'L',1);
    $pdf->Cell(40,6,$afgerond,1,0,'L',1);




    //Go to next row
    $y_axis = $y_axis + $row_height;
    $i = $i + 1;
}

$conn->close();

//Send file
$pdf->Output();
?>
