<?php
	session_start();
	$conn = oci_connect('admin','1234','127.0.0.1/xe');
	
?>
	<style>
	html { background: url(images/iosbackground.png) no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	}
	</style>


<?php

	$query_max_empid = oci_parse($conn, 'select max(payroll_id) from payroll');
	oci_execute($query_max_empid);

	$empid = oci_fetch_row($query_max_empid);
	$empid[0]++; 
	
	
	//$amount = empty($_POST['p_amount']) ? 0 : $_POST['p_amount'];
	$amount = isset($_POST['p_amount']) ? $_POST['p_amount'] : 0;
	$id = isset($_POST['p_id']) ? $_POST['p_id'] : 0;


	
	isset($_POST['o_quantity']) ? $_POST['o_quantity'] : 0;
	

	$delivDate = date('d-m-Y', strtotime($_POST['p_start']));    
	$delivDate1 = date('d-m-Y', strtotime($_POST['p_end']));    
	$delivDate2 = date('d-m-Y', strtotime($_POST['p_date_rec'])); 
	
	$delivInsertionSql = "INSERT INTO payroll (start_day,end_day,date_received,amount,employee_id,payroll_id) VALUES (to_date('".$delivDate."','dd-mm-yy'),to_date('".$delivDate1."','dd-mm-yy'),to_date('".$delivDate1."','dd-mm-yy'),:php_amount,:php_id,:php_prod)";
	$delivInsertionParse = oci_parse($conn, $delivInsertionSql);
	
	oci_bind_by_name($delivInsertionParse, ':php_id', $id);
	oci_bind_by_name($delivInsertionParse, ':php_amount', $amount);
	oci_bind_by_name($delivInsertionParse, ':php_prod', $empid[0]);
	
	
	oci_execute($delivInsertionParse);
	
	 
	if($delivInsertionParse)	{
		print "            Payroll Added Sucessfully";
			$url='Payroll.php';
		echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
	}
	
	
	?>