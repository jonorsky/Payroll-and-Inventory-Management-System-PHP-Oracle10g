<?php
  include('session.php');
  $conn = oci_connect('admin', '1234', 'localhost/XE');
?>
<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title></title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="wrapper"> 

  <div id="header"> 

    <div class="navigation">
      <ul>
        <li><a href="employee.php">Home</a></li>
		
		
	<li><a href="LogOut.php">Log Out</a></li>
      </ul>
    </div>

  </div>
  <div id="page_content"> 
    <div class="left_side_bar"> 

      <div class="col_1">
        <h1>Print Attendance Record</h1>
        <div class="box">
	<form method = "post" action = "#.php">
	  Print:<br>
	  <center><input type="submit" value = " Submit "></center><br>
	</form>
        </div>
      </div>
    </div>
    <div class="right_section">
      <div class="common_content">
        <center><h2>Employee Attendance Report of <?php echo $user ?></h2></center>
	<hr>
        <center>
		<?php
			echo "";
			
	$php_usercheck = $user;
	
	$query_quantity = oci_parse($conn, "SELECT * FROM employee WHERE username = ('$user')");
	oci_execute($query_quantity);
	$get_quantity = oci_fetch_row($query_quantity);		
			
	$stid = oci_parse($conn, "select * from timesheet where employee_id = ('$get_quantity[2]')");
	oci_execute($stid);
   echo "<table>";
     echo "<tr>";
     echo "<td>Check In</td>";
     echo "<td>Check Out</td>";
	 echo "<td>Date</td>";
	 echo "<td>Employee ID</td>";

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
		<br><br>
		</center>
	<br><br><hr>

	</div>
    </div>

    <div class="clear"></div>

  </div>

</div>

</body></html>