<!DOCTYPE html>
<?php
  $conn = oci_connect('db2', 'project', 'localhost/XE');
  $search = "SELECT * from Publisher order by Publisher_ID";
  $query = oci_parse($conn, $search);
  oci_execute($query);
?>

<?php
  $conn = oci_connect('db2', 'project', 'localhost/XE');
  $PubID = isset($_POST['updatePubID']) ? $_POST['updatePubID'] : ' ';
  $PubName = isset($_POST['updatePubName']) ? $_POST['updatePubName'] : ' ';
  $updatePub = "UPDATE Publisher set Publisher_ID = '$PubID', Publisher_Name = '$PubName' where Publisher_ID = '$PubID'";
  $Pubquery = oci_parse($conn, $updatePub);
  oci_execute($Pubquery);
?>
<html>
<head>
<meta charset="UTF-8">
<title>Automated Library System</title>
<meta name="description" content="Automated Library System">
<meta name="keywords" content="keyword1, keyword2, keyword3">
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="wrapper"> 

  <div id="header"> 

    <div class="top_banner">
      <h1>Automated Library System</h1>
      <p><b><i>Online Library for Naga City Science High School</i></b></p>
    </div>

    <div class="navigation">
      <ul>
        <li><a href="HomeLoggedIn.php">Home</a></li>
        <li><a href="Records.php">Records</a></li>
		<li><a href="Editbook.php">Books</a></li>
		<li><a href="EditSubject.php">Subjects</a></li>
		<li><a href="EditBorrower.php">Borrowers</a></li>
		<li><a href="EditPublisher.php">Publisher</a></li>
		<li><a href="EditAuthor.php">Author</a></li>
		<li><a href="LogOut.php">Log Out</a></li>
      </ul>
    </div>

  </div>
  <div id="page_content"> 
    <div class="left_side_bar"> 
      <div class="col_1">
        <h1>Update Publisher</h1>
        <div class="box">
        <form method = "post">
	  Publisher ID<br>
	  <input type = "text" name = "updatePubID"><br> 
	  <hr>
	  New Publisher Name<br>
	  <input type = "text" name = "updatePubName"><br><br>
	  <center><input type="submit" value = "   Update   "></center><br><br>
	</form>
        </div>
      </div>
    
    </div>
	
	
    <div class="right_section">
      <div class="common_content">
        <center><h2>Search Publisher</h2></center>
	<hr>
    <form method ="post"><center>
	  <table>
		<tr>
			<th>Publisher_ID/PublisherName</th>
		</tr>
		<tr>
			<td><center><input type = "text" name = "searchPub"></center></td>
		</tr>
	  </table><br>
	  <input type="submit" value = "   Search   "><br>
	</center></form>
	<?php
     $conn = oci_connect('db2', 'project', 'localhost/XE');
     $id = isset($_POST['searchPub']) ? $_POST['searchPub'] : ' ';
     $searchPubl = "select * from Publisher where Publisher_ID = '$id' or Publisher_Name = '$id'";
     $querySearchPub = oci_parse($conn, $searchPubl);
     oci_execute($querySearchPub);
     echo "<table>";
     echo "<tr>";
     echo "<td>Publisher_ID</td>";
     echo "<td>Publisher_Name</td>";
     echo "</tr>";
  while($row = oci_fetch_array($querySearchPub)){
	 echo "<tr>";
	 echo "<td>" .$row['PUBLISHER_ID']. "</td><td>" .$row['PUBLISHER_NAME']. "</td>";
	 echo "</tr>";
  }
  echo "</table>";
  ?>
	<hr>
	<br>
	<center>
	<table>
    <tr>
    <td>PUBLISHER_ID</td>
    <td>PUBLISHER NAME</td>
	</tr>
	<?php while ($row = oci_fetch_array($query)): ?>
	<tr>
	<td><?php echo $row['PUBLISHER_ID'];?></td>
	<td><?php echo $row['PUBLISHER_NAME'];?></td>
	</tr>
	<?php endwhile; ?>
	</table>
	</center>

	</div>
    </div>

    <div class="clear"></div>

    <!--start footer from here-->
    <div id="footer">Copyright &copy; 2014. Design by <a href="http://www.htmltemplates.net" target="_blank">HTML Templates</a><br>

    <!--DO NOT remove footer link-->
    <!--Template designed by--><a href="http://www.htmltemplates.net"><img src="images/footer.gif" class="copyright" alt="www.htmltemplates.net"></a></div>

    <!--/. end footer from here-->
  </div>

</div>

</body></html>