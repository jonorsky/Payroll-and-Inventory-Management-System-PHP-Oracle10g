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

	
	$id = isset($_POST['a_id']) ? $_POST['a_id'] : 0;

	$delivDate = date('d-m-Y', strtotime($_POST['a_start']));    
	$delivDate1 = date('d-m-Y', strtotime($_POST['a_end']));    
	$delivDate2 = date('d-m-Y', strtotime($_POST['a_date'])); 
	
	$delivInsertionSql = "INSERT INTO timesheet (check_in,check_out,dates,employee_id) VALUES (to_date('".$delivDate."','dd-mm-yy'),to_date('".$delivDate1."','dd-mm-yy'),to_date('".$delivDate2."','dd-mm-yy'),:php_id)";
	$delivInsertionParse = oci_parse($conn, $delivInsertionSql);
	
	oci_bind_by_name($delivInsertionParse, ':php_id', $id);
	
	
	oci_execute($delivInsertionParse);
	
	 
	if($delivInsertionParse)	{
		print "            Time Record Added Sucessfully";
			$url='attendance.php';
		echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
	}
	
	
	?>