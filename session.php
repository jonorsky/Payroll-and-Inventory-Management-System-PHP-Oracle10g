<?php
    $conn = oci_connect('admin','1234','localhost/XE');
    session_start();
	$user = $_SESSION['userLogIn'];
	$user1 = $_SESSION['username'];
?>