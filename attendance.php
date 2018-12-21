<?php
  include('session.php');
  if($user!='ADMIN')	{
		die;
  }

?>

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
  
	
	  <li><a href="LogOut.php">Log Out</a></li>
      </ul>
    </div>

  </div>
  <div id="page_content"> 
    <div class="left_side_bar"> 
      <div class="col_1">
	  
	  
        <h1>Add Attendance</h1>
        <div class="box">
        <form method = "post" action="checkattendance.php">
	  Employee ID:<br>
	  <input type = "text" name = "a_id"><br> 
	  <br>
	  Check In:<br>
	  <input type = "text" name = "a_start"><br><br>
	  Check Out:<br>
	  <input type = "text" name = "a_end"><br><br>
	  Date:<br>
	  <input type = "text" name = "a_date"><br><br>
	  <center><input type="submit" value = "   Submit   "></center><br><br>
	</form>
        </div>
      </div>
      
    </div>
    <div class="right_section">
	
	
	
      <div class="common_content">
        <center><h2>Search Attendance Record</h2></center>
		 <center><h5>Input Employee ID</h2></center><br>
	<hr>
    <form method = "post" ><center>
	  <table>
		<tr>
			<td><center><input type = "text" name = "searchAuth"></center></td>
		</tr>
	  </table><br>
	  <input type="submit" value = "   Search   "><br>
	</center></form>
	<br>
	<br>
	<center>
	<?php
     $conn = oci_connect('admin', '1234', 'localhost/XE');
     $id = isset($_POST['searchAuth']) ? $_POST['searchAuth'] : 0;
     $searchAuthor = "select * from timesheet where employee_id ='$id'";
     $querySearchAuthor = oci_parse($conn, $searchAuthor);
     oci_execute($querySearchAuthor);
     echo "<table>";
     echo "<tr>";
     echo "<td>Check In</td>";
     echo "<td>Check Out</td>";
	 echo "<td>Date</td>";
	 echo "<td>Employee ID</td>";

     echo "</tr>";
  while($row = oci_fetch_array($querySearchAuthor)){
	 echo "<tr>";
	 echo "<td>" .$row[0]. "</td><td>" .$row[1]. "</td><td>" .$row[2]. "</td><td>" .$row[3]. "</td><td></td>";
	 echo "</tr>";
  }
  echo "</table>";
  ?>
  </center>

	<br>
	<br>
	<br>

<br>
	
	
	
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