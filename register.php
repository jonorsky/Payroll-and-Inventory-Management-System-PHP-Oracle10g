<?php
	session_start();
	$conn = oci_connect('admin','1234','127.0.0.1/xe');
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Inventory and Payroll System</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="wrapper"> 

  <div id="header"> 



    <div class="navigation">
      <ul>
        <li><a href="home.php">Home</a></li>
      </ul>
    </div>

  </div>

  <div id="page_content"> 
    <div class="left_side_bar"> 
      <div class="col_1">
        <h1>Log In</h1>
        <div class="box">
	<form method = "post" action = "log.php">
	  <br>Username<br>
	  <input type = "text" name = "username"><br>
	  Password<br>
	  <input type="password" name = "pass"><br><br>
	  <center><input type="submit" value = "   Log In   "><br><br></center>
	</form>
        </div>
      </div>
    </div>

    <div class="right_section">
      <div class="common_content">
	<hr>
        <h2>Register Employee Account</h2>
	<hr>
	<br>
	<form method = "post" action="checkregister.php">
	Username: <br>
	<input type = "text" name = "f_username"> <br>	
	Password: <br>
	<input type = "password" name = "f_password"> <br>
	
	First Name:<br>
	<input type = "text"  name = "f_first"> <br>
	Middle Initial: <br>
	<input type = "text" name = "f_middle"> <br>
	Last Name:<br>
	<input type = "text"  name = "f_last"> <br>
	Age: <br>
	<input type = "text" name = "f_age"> <br>
	Address:<br>
	<input type = "text"  name = "f_address"> <br>

	<br>

	<input type = "submit" value ="submit"> 

	</form>

	   
	
	</div>
    </div>
    <div class="clear"></div>


  </div>

</div>

</body></html>