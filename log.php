<?php
    session_start();
    $conn = oci_connect('admin','1234','127.0.0.1/xe');
    $name=$_POST['username'];
    $pwd=$_POST['pass'];
    if($name != '' && $pwd!='' && $name == 'ADMIN'){
		$_SESSION['userLogIn'] = $name;
      $query= oci_parse($conn,"select * from employee where Username='".$name."' and Password='".$pwd."'");
      oci_execute($query);
      $res= oci_fetch_row($query);
        if($res && $name = 'ADMIN'){
          header('location:admin.php');
		  exit;
        }
		else{
          header('location:Home.php');
		  exit;
        }
    }
	else if($name != '' && $pwd != ''){
		$query= oci_parse($conn,"select * from employee where Username='".$name."' and Password='".$pwd."'");
		$_SESSION['userLogIn'] = $name;
      oci_execute($query);
      $res= oci_fetch_row($query);
        if($res){
          header('location:employee.php');
		  exit;
        }
		else{
          header('location:Home.php');
		  exit;
        }
	}
?>