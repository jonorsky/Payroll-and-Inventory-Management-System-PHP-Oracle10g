<!DOCTYPE html>
<?php
  $conn = oci_connect('admin', '1234', 'localhost/XE');
  $search = "SELECT * from employee order by employee_id";
  $query = oci_parse($conn, $search);
  oci_execute($query);
?>

<?php
  $conn = oci_connect('admin', '1234', 'localhost/XE');
  $authNo = isset($_POST['updateAuthorNo']) ? $_POST['updateAuthorNo'] : 0;
  $firstN = isset($_POST['updateFirstName']) ? $_POST['updateFirstName'] : ' ';
  $lastN = isset($_POST['updateLastName']) ? $_POST['updateLastName'] : ' ';
  $midN = isset($_POST['updateMI']) ? $_POST['updateMI'] : ' ';
  $updateAuth = "UPDATE employee set employee_id = '$authNo', first_name = '$firstN', middle_initial = '$midN', last_name = '$lastN' where employee_id = '$authNo'";
  $Authquery = oci_parse($conn, $updateAuth);
  oci_execute($Authquery);
  
?>


<html>
<head>
<meta charset="UTF-8">
<title>Payroll and Inventory Management System</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="wrapper"> 

  <div id="header"> 

 

    <div class="navigation">
      <ul>
        <li><a href="admin.php">Home</a></li>
        <li><a href="EditEmployee.php">Employee</a></li>
		
		
		<li><a href="LogOut.php">Log Out</a></li>
      </ul>
    </div>

  </div>
  <div id="page_content"> 
    <div class="left_side_bar"> 
      <div class="col_1">
	  

        <div class="box">
        
	 View Employee Attendance Record<br>
	
        </div>
      </div>
      
    </div>
    <div class="right_section">
      <div class="common_content">
       

	<br>
	
<hr>
<br>
<center>

	     <center><h2>View Employee Attendance Record</h2></center>
	     <center><h5>Input Employee ID</h2></center><br>
		 
		  <form method = "post" >
		  <center>
			<table>
				<tr>
					<td><center><input type = "text" name = "searchattendance"></center></td>
				</tr>
			</table><br>
			
			<input type="submit" value = "   Search   "><br>
			</center>
		</form>

		<br>
		
<?php
$conn = oci_connect('admin', '1234', 'localhost/XE');
	$attendance = isset($_POST['searchattendance']) ? $_POST['searchattendance'] : 0;
	echo "";
	//$stid = oci_parse($conn, 'SELECT * FROM timesheet where employee_id = ('$attendance')');
	
	$stid = oci_parse($conn, "SELECT *  FROM employee WHERE username = ('$attendance')");
	oci_execute($stid);

	echo "<table border='3'>\n";
	while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
		echo "<tr>\n";
		foreach ($row as $item) {
			echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp; ") . "</td>\n";
		}
		echo "</tr>\n";
	}
	echo "</table>\n";
	
	oci_free_statement($stid);
	oci_close($conn);	
		
?>	
	
	
	
	<br>
	<br>
</center>
	<hr>
	<br>

  

	</div>
    </div>

    <div class="clear"></div>

  </div>

</div>

</body></html>