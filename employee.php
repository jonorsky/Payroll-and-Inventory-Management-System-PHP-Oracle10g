<?php
  include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Payroll and Inventory Management System</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="wrapper"> 


    <div class="navigation">
      <ul>
        <li><a href="employee.php">Home</a></li>
        <li><a href="payslip.php">Payslip</a></li>
        <li><a href="attendance_record.php">Attendance Record</a></li>
	    <li><a href="LogOut.php">Log Out</a></li>
      </ul>
    </div>


  <div id="page_content"> 
    <div class="left_side_bar"> 
      <div class="col_1">
        <h1>Greetings</h1>
		
        <div class="box">
	<p>Hello <?php echo "$user";?>! You are now currently logged in.</p>
        </div>
      </div>
    </div>

    <div class="right_section">
      <div class="common_content">
	<hr>
        <h2>Introduction</h2>
	<hr>
	<b>Vision:</b><br>
	To be the most Filipino brand and world-class company
	Passionate in bringing out the best in a Filipino with products that world and with services that epitomizes
	the Filipino Hospitability with genuine care and service from the heart.
       </div>
    </div>
    <div class="clear"></div>


  </div>

</div>

</body></html>