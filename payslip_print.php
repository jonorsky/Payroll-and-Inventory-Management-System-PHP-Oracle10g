<?php
	include('session.php');
	
	$php_usercheck = $user;
	
	$query_quantity = oci_parse($conn, "SELECT * FROM employee WHERE username = ('$user')");
	oci_execute($query_quantity);
	$get_quantity = oci_fetch_row($query_quantity);

	
	$sumSql = oci_parse($conn,"select * from payroll where employee_id = ('$get_quantity[2]')");
	oci_execute($sumSql);
	$total = 0;

	while($objResult = oci_fetch_array($sumSql,OCI_BOTH)) {
    $total += $objResult[0];
	}

/*
	echo $get_quantity[3];	//name
	echo $get_quantity[2];	//employee id
	
	if($get_quantity[0]!=0)	{
		print "Username Exist! Please Choose another Username";
		$url='register.php';
		
	}	*/
	

require("fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->Addpage();

$pdf->SetFont("Arial","B",16);
$pdf->Cell(0,10,"Inventory and Management System", 1, 1, C);
$pdf->Cell(0,20,"PAYSLIP", 0, 1,C);
$pdf->Cell(30,10,"Name:", 1, 0,L);
$pdf->Cell(60,10,$get_quantity[3], 1, 1);
$pdf->Cell(30,10,"ID:", 1, 0);
$pdf->Cell(60,10,$get_quantity[2], 1, 1);
$pdf->Cell(0,10,"", 0, 1);
$pdf->Cell(0,10,"", 0, 1);

$pdf->Cell(45,10,"Earnings", 1, 0,C);
$pdf->Cell(45,10,"Amount", 1, 0,C);
$pdf->Cell(45,10,"Deduction", 1, 0,C);
$pdf->Cell(45,10,"Amount", 1, 1,C);

$pdf->SetFont("Arial","i",12);
$pdf->Cell(45,10,"Basic Salary", 1, 0,L);

$pdf->SetFont("Arial","b",12);
$pdf->Cell(45,10,$total, 1, 0,C);

$pdf->SetFont("Arial","i",12);
$pdf->Cell(45,10,"Taxation", 1, 0,L);

$pdf->SetFont("Arial","i",12);
$pdf->Cell(45,10,"5%", 1, 1,C);
$pdf->Cell(45,10,"", 1, 0,C);
$pdf->Cell(45,10,"", 1, 0,C);

$pdf->SetFont("Arial","i",12);
$pdf->Cell(45,10,"Others", 1, 0,L);
$pdf->Cell(45,10,"10%", 1, 1,C);
$pdf->Cell(45,10,"", 1, 0,C);
$pdf->Cell(45,10,"", 1, 0,C);
$pdf->Cell(45,10,"Total Deduction:", 1, 0,C);
$pdf->Cell(45,10,"15%", 1, 1,C);
$pdf->Cell(45,10,"", 1, 0,C);
$pdf->Cell(45,10,"", 1, 0,C);
$pdf->Cell(45,10,"", 1, 0,C);
$pdf->Cell(45,10,"", 1, 1,C);
$pdf->Cell(45,10,"Gross Earnings", 1, 0,L);
$pdf->Cell(45,10,$total, 1, 0,C);
$pdf->Cell(45,10,"Total Deductions", 1, 0,L);
$pdf->Cell(45,10,"15%", 1, 1,C);
$pdf->Cell(45,10,"", 1, 0,C);
$pdf->Cell(45,10,"", 1, 0,C);


$total_with_deduct = 0.15 * $total;

$total_final = $total - $total_with_deduct;


$pdf->SetFont("Arial","B",12);
$pdf->Cell(45,10,"Total Earnings:", 1, 0,C);
$pdf->Cell(45,10,$total_final, 1, 0,C);




$pdf->output();


?>