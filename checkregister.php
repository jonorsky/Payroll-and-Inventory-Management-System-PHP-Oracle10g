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
	
	$php_usercheck = $_POST["f_username"];
	
	$query_quantity = oci_parse($conn, "SELECT COUNT(*) FROM employee WHERE username = ('$php_usercheck')");
	oci_execute($query_quantity);
	$get_quantity = oci_fetch_row($query_quantity);


	if($get_quantity[0]!=0)	{
		print "Username Exist! Please Choose another Username";
		$url='register.php';
		echo '<META HTTP-EQUIV=REFRESH CONTENT="3; '.$url.'">';
	}
	else {
	
	$stid = oci_parse($conn, 'INSERT INTO 

	employee (first_name, middle_initial, last_name, age, address, employee_id, order_no, password,username) 
	values(:php_first, :php_middle,:php_last, :php_age, :php_address, :php_empid, :php_orderno, :php_pass,:php_user)');

	$query_max_empid = oci_parse($conn, 'select max(employee_id) from employee');
	oci_execute($query_max_empid);

	$empid = oci_fetch_row($query_max_empid);
	$empid[0]++; 

	$orderno = 0;
	
	oci_bind_by_name($stid, ':php_first', $_POST["f_first"]);
	oci_bind_by_name($stid, ':php_middle', $_POST["f_middle"]);
	oci_bind_by_name($stid, ':php_last', $_POST["f_last"]);
	oci_bind_by_name($stid, ':php_age', $_POST["f_age"]);
	oci_bind_by_name($stid, ':php_address', $_POST["f_address"]);
	oci_bind_by_name($stid, ':php_empid', $empid[0]);
	oci_bind_by_name($stid, ':php_orderno', $orderno);
	oci_bind_by_name($stid, ':php_pass', $_POST["f_password"]);
	oci_bind_by_name($stid, ':php_user', $_POST["f_username"]);

	$r = oci_execute($stid); 

	if($r)	{
		print "Registered Sucessfully";
		$url='home.php';
		echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
	}
	
	}
	
?>
	

