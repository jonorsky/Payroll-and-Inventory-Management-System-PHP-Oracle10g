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

<?php
  $conn = oci_connect('admin', '1234', 'localhost/XE');
  $del = isset($_POST['delete_employee']) ? $_POST['delete_employee'] : 0;
  $delete1 = "DELETE FROM employee where employee_id = '$del'";
 /* $delete2 = "DELETE FROM age where employee_id = '$del'";
  $delete3 = "DELETE FROM first_name where employee_id = '$del'";
  $delete4 = "DELETE FROM gender where employee_id = '$del'";
  $delete5 = "DELETE FROM last_name where employee_id = '$del'";
  $delete6 = "DELETE FROM middle_initial where employee_id = '$del'";
  $delete7 = "DELETE FROM order_no where employee_id = '$del'";
  $delete8 = "DELETE FROM password where employee_id = '$del'";
  */
  
   $d1 = oci_parse($conn, $delete1);
  /* $d2 = oci_parse($conn, $delete2);
   $d3 = oci_parse($conn, $delete3);
   $d4 = oci_parse($conn, $delete4);
   $d5 = oci_parse($conn, $delete5);
   $d6 = oci_parse($conn, $delete6);
   $d7 = oci_parse($conn, $delete7);
   $d8 = oci_parse($conn, $delete8);
   */
   oci_execute($d1);
   /*oci_execute($d2);
   oci_execute($d3);
   oci_execute($d4);
   oci_execute($d5);
   oci_execute($d6);
   oci_execute($d7);
   oci_execute($d8);
  */
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
	  
	  
        <h1>Update Employee Record</h1>
        <div class="box">
        <form method = "post">
	  Employee ID:<br>
	  <input type = "text" name = "updateAuthorNo"><br> 
	  <hr>
	  Employee First Name<br>
	  <input type = "text" name = "updateFirstName"><br><br>
	  Employee MI<br>
	  <input type = "text" name = "updateMI"><br><br>
	  Employee Last Name<br>
	  <input type = "text" name = "updateLastName"><br><br>
	  <center><input type="submit" value = "   Update   "></center><br><br>
	</form>
        </div>
      </div>
	  
	  <br>
	  <br>
	  
	   <div class="col_1">
	  
	  
        <h1>Delete Employee Record</h1>
        <div class="box">
        <form method = "post">
	  Employee ID:<br>
	  <input type = "text" name = "delete_employee"><br> 

	  <center><input type="submit" value = "   Update   "></center><br><br>
	</form>
        </div>
      </div>
	  
	 
	  <br>
	  <br>
      
    </div>
    <div class="right_section">
      <div class="common_content">
        <center><h2>Search Employee Record</h2></center>
		 <center><h5>Input Employee Name or Last Name</h2></center><br>
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
     $id = isset($_POST['searchAuth']) ? $_POST['searchAuth'] : ' ';
     $searchAuthor = "select * from employee where first_name ='$id' or last_name ='$id'";
     $querySearchAuthor = oci_parse($conn, $searchAuthor);
     oci_execute($querySearchAuthor);
     echo "<table>";
     echo "<tr>";
     echo "<td>EMPLOYEE_ID</td>";
     echo "<td>FIRST NAME</td>";
	 echo "<td>MI</td>";
	 echo "<td>LAST NAME</td>";
	 echo "<td>Username</td>";
     echo "</tr>";
  while($row = oci_fetch_array($querySearchAuthor)){
	 echo "<tr>";
	 echo "<td>" .$row[2]. "</td><td>" .$row[3]. "</td><td>" .$row[6]. "</td><td>" .$row[5]. "</td><td>" .$row[9]. "</td>";
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