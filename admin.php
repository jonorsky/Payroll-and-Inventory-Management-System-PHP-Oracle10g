<?php
  include('session.php');
  if($user!='ADMIN')	{
		die;
  }

?>

<!DOCTYPE html>

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
		<li><a href="attendance.php">Attendance</a></li>
		<li><a href="payroll.php">Payroll</a></li>
	
	
		<li><a href="LogOut.php">Log Out</a></li>
      </ul>
    </div>
  </div>

  <div id="page_content"> 
    <div class="left_side_bar"> 
      <div class="col_1">
        <h1>Admin v1.0</h1>
        <div class="box">
	<p>Hello Admin! You are now currently logged in.</p>
        </div>
      </div>
    </div>

    <div class="right_section">
      <div class="common_content">
	<hr>
        <h2>Admin Control Panel</h2>
	<hr>

		<b>Vision:</b><br>
	To be the most Filipino brand and world-class company
	Passionate in bringing out the best in a Filipino with products that world and with services that epitomizes
	the Filipino Hospitability with genuine care and service from the heart.</div>
    </div>
    <div class="clear"></div>

  </div>

</div>

</body></html>